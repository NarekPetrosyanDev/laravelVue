<?php

use App\Http\Controllers\Backend\AdminMainController;
use App\Http\Controllers\Frontend\MainController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [MainController::class, 'index'])->name('home');


Route::get('/{any}', function (){
    return view('layouts.frontend');
})->where('any', '.*');



