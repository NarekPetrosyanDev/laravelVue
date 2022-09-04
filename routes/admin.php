<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'isAdmin'], function () {
    Auth::routes();

    Route::get('/admin', function () {
        return view('layouts.backend');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/{any}', function () {
            return view('layouts.backend');
        })->where('any', '.*');
    });

});
