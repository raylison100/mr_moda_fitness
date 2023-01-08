<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class AuthController extends Controller
{
    protected AppService $service;

    /**
     * @param AuthService $service
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
                'remember_me' => 'boolean'
            ]);

            return response()->json($this->service->login($request->all()));
        } catch (Exception $exception) {
            return $this->sendBadResposnse($exception);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users',
                'password' => 'required|string',
                'c_password' => 'required|same:password'
            ]);

            return response()->json($this->service->register($request->all()), 201);
        } catch (Exception $exception) {
            return $this->sendBadResposnse($exception);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function user(Request $request): JsonResponse
    {
        return response()->json($this->service->user($request->user()));
    }
}
