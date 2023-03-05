<?php

namespace App\Repositories;

use App\Entities\Stock;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface StockRepository.
 *
 * @package namespace App\Repositories;
 */
interface StockRepository extends RepositoryInterface
{
    public function restoreStockQtd(Stock $stock, int $qtd): void;
}
