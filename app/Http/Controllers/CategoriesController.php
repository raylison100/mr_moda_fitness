<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\CategoryService;

/**
 * Class CategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CategoriesController extends Controller
{
    protected AppService $service;

    /**
     * @param CategoryService $service
     */
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
}
