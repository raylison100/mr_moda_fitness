<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\SubCategoryService;

/**
 * Class SubCategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class SubCategoriesController extends Controller
{
    protected AppService $service;

    /**
     * @param SubCategoryService $service
     */
    public function __construct(SubCategoryService $service)
    {
        $this->service = $service;
    }
}
