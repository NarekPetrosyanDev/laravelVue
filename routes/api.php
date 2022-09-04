<?php

use App\Http\Controllers\Backend\AdminMainController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\CartController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('auth-user', [AdminMainController::class, 'authUser']);
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);

Route::get('cart', [CartController::class, 'cart']);
Route::post('cart/add/{id}', [CartController::class, 'cartAdd']);
Route::post('cart/quantity/change', [CartController::class, 'quantityChange']);
