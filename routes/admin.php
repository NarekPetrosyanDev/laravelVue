<?php

use App\Http\Controllers\Backend\AdminMainController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin'], function (){
    Route::get('/', [AdminMainController::class, 'index'])->name('admin-main');
//    Route::resource('products', ProductController::class);

    Route::get('/{any}', function (){
        return view('layouts.backend');
    })->where('any', '.*');

});
