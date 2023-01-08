<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected AppService $service;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            return response()->json($this->service->all($request->query->get('limit', 15)));
        } catch (Exception $exception) {
            return $this->sendBadResposnse($exception);
        }
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            return response()->json($this->service->find($id));
        } catch (Exception $exception) {
            return $this->sendBadResposnse($exception);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            return response()->json($this->service->create($request->all()));
        } catch (Exception $exception) {
            return $this->sendBadResposnse($exception);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            return response()->json($this->service->update($request->all(), $id));
        } catch (Exception $exception) {
            return $this->sendBadResposnse($exception);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            return response()->json($this->service->delete($id));
        } catch (Exception $exception) {
            return $this->sendBadResposnse($exception);
        }
    }

    /**
     * @param Exception $exception
     * @return JsonResponse
     */
    protected function sendBadResposnse(Exception $exception): JsonResponse
    {
        Log::error($exception->getMessage());
        Log::error($exception->getTraceAsString());

        $error = [
            'error' => 'true',
            'message' => $exception->getMessage()
        ];

        try {
            return response()->json($error, $exception->getCode());
        } catch (Exception) {
            return response()->json($error, 500);
        }
    }
}
