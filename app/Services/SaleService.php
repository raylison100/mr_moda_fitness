<?php

namespace App\Services;

use App\Entities\Stock;
use App\Enuns\SalesStatusEnum;
use App\Presenters\SaleDetailPresenter;
use App\Repositories\SaleItenRepository;
use App\Repositories\SaleRepository;
use App\Transformers\SaleTransformer;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class SaleService extends AppService
{
    protected RepositoryInterface $repository;
    private SaleItenRepository $saleItenRepository;
    private ProductService $productService;
    private InvoicingService $invoicingService;

    /**
     * @param SaleRepository $repository
     * @param SaleItenRepository $saleItenRepository
     * @param ProductService $productService
     * @param InvoicingService $invoicingService
     */
    public function __construct(
        SaleRepository $repository,
        SaleItenRepository $saleItenRepository,
        ProductService $productService,
        InvoicingService $invoicingService
    ) {
        $this->repository = $repository;
        $this->saleItenRepository = $saleItenRepository;
        $this->productService = $productService;
        $this->invoicingService = $invoicingService;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function createSales(array $data): array
    {
        $itens = $data['itens'];

        unset($data['itens']);

        foreach ($itens as $item) {
            if (!$this->productService->checkStock(
                $item['stock']['code'],
                $item['stock']['qtd']
            )) {
                throw new Exception('Estoque nao disponivel para o produto: ' . $item['code'], 406);
            }
        }

        try {
            DB::beginTransaction();

            $data['status'] = SalesStatusEnum::CONFIRMED->name;

            $sale = $this->repository->skipPresenter()->create($data);

            foreach ($itens as $item) {
                $stock = $this->productService->findStockByCode($item['stock']['code']);

                $this->saleItenRepository->create([
                    'qtd' => $item['stock']['qtd'],
                    'amount' => $item['total_itens'],
                    'stock_id' => $stock->id,
                    'sale_id' => $sale->id
                ]);

                $this->productService->updateStock(
                    $item['stock']['code'],
                    $item['stock']['qtd']
                );
            }

            $billingDate = Carbon::now();

            if ($sale->cash_value != null && $sale->cash_value > 0) {
                $this->invoicingService->create([
                    'amount' => $sale->cash_value,
                    'billing_date' => $billingDate->copy(),
                    'sale_id' => $sale->id,
                ]);
            }

            if ($sale->installment_value != null && $sale->installment_value > 0) {
                $installmentValue = ($sale->installment_value / $sale->installment_qtd);

                for ($count = 0; $count < $sale->installment_qtd; $count++) {
                    $this->invoicingService->create([
                        'amount' => $installmentValue,
                        'billing_date' => $billingDate->copy()->addMonths($count + 1),
                        'sale_id' => $sale->id,
                    ]);
                }
            }

            DB::commit();

            return ['data' => (new SaleTransformer())->transform($sale)];
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            throw new Exception('Error ao realizar venda', 500);
        }
    }

    /**
     * @throws Exception
     */
    public function saleCancellation(int $id): array
    {
        try {
            DB::beginTransaction();

            $sale = $this->repository->skipPresenter()->update([
                'status' => SalesStatusEnum::CANCELED->name
            ], $id);

            foreach ($sale->saleItens as $item) {
                $stock = $item->stock;
                $this->productService->restoreStockQtd($stock, $item->qtd);
            }

            DB::commit();

            return ['data' => (new SaleTransformer())->transform($sale)];
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            throw new Exception('Error ao realizar cancelamento de venda', 500);
        }
    }

    /**
     * @param $id
     * @param bool $skipPresenter
     * @return mixed
     */
    public function find($id, bool $skipPresenter = false): mixed
    {
        return $this->repository
            ->setPresenter(SaleDetailPresenter::class)
            ->skipPresenter($skipPresenter)->find($id);
    }
}
