<?php

use App\Http\Controllers\API\barangAPIController;
use App\Http\Controllers\API\pengrajinAPIController;
use App\Http\Controllers\API\adminAPIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('admin', adminAPIController::class);
Route::resource('barang', barangAPIController::class);
Route::post('/barang/{id}', [barangAPIController::class, 'update']);
Route::resource('peng', pengrajinAPIController::class);
Route::post('/peng/{id}', [pengrajinAPIController::class, 'update']);
