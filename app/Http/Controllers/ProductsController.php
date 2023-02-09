<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\JsonResponse;

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

    /**
     * @param string $code
     * @return JsonResponse
     */
    public function findByCode(string $code): JsonResponse
    {
        try {
            $data = $this->service->findByCode($code);

            return response()->json($data, empty($data) ? 204 : 200);
        } catch (Exception $exception) {
            return $this->sendBadResposnse($exception);
        }
    }
}
