<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\SalesProduct\App\Http\Controllers\SalesProductController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::prefix('/v1/sale')->group(function () {
    Route::get('/', [SalesProductController::class, 'index']);
    Route::post('/', [SalesProductController::class, 'store']);
    Route::get('/{id}', [SalesProductController::class, 'show']);
    Route::delete('/{id}', [SalesProductController::class, 'destroy']);
});