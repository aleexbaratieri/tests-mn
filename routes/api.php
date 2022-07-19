<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('', function() {
    return response()->json(['msg' => 'Welcome!']);
});

Route::apiResource('users', UserController::class);
Route::apiResource('addresses', AddressController::class);
Route::apiResource('cities', CityController::class);
Route::apiResource('states', StateController::class);

Route::get('users/statistics/counter', [ UserController::class, 'statisticsCouter' ]);