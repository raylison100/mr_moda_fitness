<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\SaleService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            return response()->json($this->service->createSales($request->all()));
        } catch (Exception $exception) {
            return $this->sendBadResposnse($exception);
        }
    }
}
