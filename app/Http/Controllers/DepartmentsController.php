<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\DepartmentService;

/**
 * Class DepartmentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class DepartmentsController extends Controller
{
    protected AppService $service;

    /**
     * @param DepartmentService $service
     */
    public function __construct(DepartmentService $service)
    {
        $this->service = $service;
    }
}
