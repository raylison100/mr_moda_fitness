<?php

namespace App\Services;

use App\Entities\Stock;
use App\Repositories\ProductRepository;
use App\Repositories\StockRepository;
use App\Transformers\ProductTransformer;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class ProductService extends AppService
{
    protected RepositoryInterface $repository;
    private readonly StockRepository $stockRepository;

    /**
     * @param ProductRepository $repository
     * @param StockRepository $stockRepository
     */
    public function __construct(
        ProductRepository $repository,
        StockRepository $stockRepository
    ) {
        $this->stockRepository = $stockRepository;
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @param bool $skipPresenter
     * @return mixed
     * @throws Exception
     */
    public function create(array $data, bool $skipPresenter = false): mixed
    {
        try {
            DB::beginTransaction();

            $product = $this->repository->skipPresenter()->create($data);
            $productId = $product->id;

            $stock = $data['stock'];

            array_map(function ($item) use ($productId) {
                $item['product_id'] = $productId;
                $item['code'] = uniqid();

                $this->stockRepository->create($item);
            }, $stock);

            DB::commit();
            return $this->repository->skipPresenter($skipPresenter)->find(
                $product->id
            );
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            throw new Exception('Error ao cria produto', 500);
        }
    }

    /**
     * @param array $data
     * @param $id
     * @param bool $skipPresenter
     * @return mixed
     * @throws Exception
     */
    public function update(array $data, $id, bool $skipPresenter = false): mixed
    {
        try {
            DB::beginTransaction();
            $product = $this->repository->skipPresenter()->update($data, $id);

            $stock = $data['stock'];

            array_map(function ($item) {
                $this->stockRepository->update($item, $item['id']);
            }, $stock);

            DB::commit();
            return $this->repository->skipPresenter($skipPresenter)->find(
                $product->id
            );
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            throw new Exception('Error ao atualizar produto', 500);
        }
    }

    /**
     * @param string $code
     * @return array
     */
    public function findByCode(string $code): array
    {
        $product = $this->repository->skipPresenter()->whereHas('stocks', function ($q) use ($code) {
            return $q->where('code', '=', $code)
                ->where('qtd', '>', 0);
        })->first();

        return $product ? ['data' => (new ProductTransformer())->transform($product)] : [];
    }

    /**
     * @param string $code
     * @param int $qtd
     * @return bool
     */
    public function checkStock(string $code, int $qtd): bool
    {
        $hasStock = true;

        $stock = $this->stockRepository
            ->skipPresenter()->findWhere([
                'code' => $code
            ])->first();

        if ($stock->qtd < $qtd) {
            $hasStock = false;
        }

        return $hasStock;
    }

    /**
     * @param string $code
     * @param int $qtd
     * @return void
     */
    public function updateStock(string $code, int $qtd): void
    {
        $stock = $this->stockRepository
            ->skipPresenter()->findWhere([
                'code' => $code
            ])->first();

        $stockQtd = $stock->qtd;

        $this->stockRepository->update([
            'qtd' => ($stockQtd - $qtd)
        ], $stock->id);
    }

    public function findStockByCode(string $code)
    {
        return $this->stockRepository
            ->skipPresenter()->findWhere([
                'code' => $code
            ])->first();
    }

    public function restoreStockQtd(Stock $stock, int $qtd): void
    {
        $this->stockRepository->restoreStockQtd($stock, $qtd);
    }
}
