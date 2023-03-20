<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    protected AppService $service;

    /**
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @return JsonResponse
     */
    public function userAbilities(): JsonResponse
    {
        try {
            $data = $this->service->userAbilities();
            return response()->json($data, empty($data) ? 204 : 200);
        } catch (\Exception $e) {
            return $this->sendBadResposnse($e);
        }
    }
}
