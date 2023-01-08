<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\InvoicingService;

/**
 * Class InvoicingsController.
 *
 * @package namespace App\Http\Controllers;
 */
class InvoicingsController extends Controller
{
    protected AppService $service;

    /**
     * @param InvoicingService $service
     */
    public function __construct(InvoicingService $service)
    {
        $this->service = $service;
    }
}
