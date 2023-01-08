<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\ProductService;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    protected AppService $service;

    /**
     * @param ProductService $service
     */
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
}
