<?php

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

Route::get('/', function () {
    return view('pages.main');
})->name('pages.main');

Route::get('/about', function(){
    return view('pages.about');
})->name('pages.about');

Route::get('/shops', function(){
    return view('pages.shops');
});

Route::get('/flowers/{flower}', [\App\Http\Controllers\FlowerController::class, 'show']);

Route::get('/flowers', [\App\Http\Controllers\FlowerController::class, 'index']);

