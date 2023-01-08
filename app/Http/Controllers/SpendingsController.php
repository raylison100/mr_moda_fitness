<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\SpendingService;

/**
 * Class SpendingsController.
 *
 * @package namespace App\Http\Controllers;
 */
class SpendingsController extends Controller
{
    protected AppService $service;

    /**
     * @param SpendingService $service
     */
    public function __construct(SpendingService $service)
    {
        $this->service = $service;
    }
}
