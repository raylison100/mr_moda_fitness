<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\InvoicingsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SpendingsController;
use App\Http\Controllers\SubCategoriesController;
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
    Route::group(['prefix' => 'categories'], function () {
        Route::apiResource('', CategoriesController::class);
    });

    Route::group(['prefix' => 'departments'], function () {
        Route::apiResource('', DepartmentsController::class);
    });

    Route::group(['prefix' => 'invoicings'], function () {
        Route::get('', [InvoicingsController::class, 'index']);
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', [ProductsController::class, 'index']);
    });

    Route::group(['prefix' => 'sales'], function () {
        Route::get('', [SalesController::class, 'index']);
    });

    Route::group(['prefix' => 'spendings'], function () {
        Route::get('', [SpendingsController::class, 'index']);
    });

    Route::group(['prefix' => 'sub-categories'], function () {
        Route::apiResource('', SubCategoriesController::class)->parameters([
            '' => 'id'
        ]);
    });
});

Route::any('/{any}', function () {
    return ['message' => 'Invalid Router', 'error' => true];
})->where('any', '.*');

