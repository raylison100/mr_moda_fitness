<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\InvoicingsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SpendingsController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['message' => 'MR_Moda_Fitness', 'error' => false];
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('abilities', [UsersController::class, 'userAbilities'])
            ->middleware(['abilities:auth-read']);
    });


    Route::group(['prefix' => 'categories'], function () {
        Route::apiResource('', CategoriesController::class)->parameters([
            '' => 'id'
        ]);
    });

    Route::group(['prefix' => 'departments'], function () {
        Route::apiResource('', DepartmentsController::class)->parameters([
            '' => 'id'
        ]);
    });

    Route::group(['prefix' => 'invoicings'], function () {
        Route::apiResource('', InvoicingsController::class)->parameters([
            '' => 'id'
        ]);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('code/{code}', [ProductsController::class, 'findByCode']);
        Route::apiResource('', ProductsController::class)->parameters([
            '' => 'id'
        ]);
    });

    Route::group(['prefix' => 'sales'], function () {
        Route::put('cancellation/{id}', [SalesController::class, 'saleCancellation']);
        Route::apiResource('', SalesController::class)->parameters([
            '' => 'id'
        ]);
    });

    Route::group(['prefix' => 'spendings'], function () {
        Route::apiResource('', SpendingsController::class)->parameters([
            '' => 'id'
        ]);
    });

    Route::group(['prefix' => 'sub-categories'], function () {
        Route::apiResource('', SubCategoriesController::class)->parameters([
            '' => 'id'
        ]);
    });
});

Route::any('/{any}', function () {
    return response()->json(['message' => 'Invalid Router', 'error' => true], 404);
})->where('any', '.*');

