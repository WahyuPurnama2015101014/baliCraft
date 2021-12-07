<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\pengrajinController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', [homeController::class, 'index']);*/
//routes admin
Route::get('admin', [adminController::class, 'index'])->middleware(['auth']);
// Route::get('barang', [barangController::class, 'index']);
// Route::get('pengrajin', [pengrajinController::class, 'index']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('brg', barangController::class);
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('peng', pengrajinController::class);
});
//punya laravel
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/{any}', function () {
    return view('admin');
})->where('any', '.*')->middleware(['auth']);
