<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\SaleService;

/**
 * Class SalesController.
 *
 * @package namespace App\Http\Controllers;
 */
class SalesController extends Controller
{
    protected AppService $service;

    /**
     * @param SaleService $service
     */
    public function __construct(SaleService $service)
    {
        $this->service = $service;
    }
}
