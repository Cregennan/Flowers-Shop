<?php

use Illuminate\Support\Facades\Route;

Route::get('login', function(){
    return view('pages.login');
})->name('login');

Route::post('login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout']);

Route::get('/', function () {
    return view('pages.main');
})->name('pages.main');

Route::get('/about', function(){
    return view('pages.about');
})->name('pages.about');

Route::get('/shops', function(){
    return view('pages.shops');
})->name('pages.shops');

Route::get('/review', function(){
    return  view('pages.review');
})->name('pages.review');

Route::get('/delivery', function(){
    return view('pages.delivery');
})->name('pages.delivery');

Route::get('/test403', function(){
    abort(403);
});


//Заказы
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'create'])->name('pages.order-make');
Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.make');

//Цветы
Route::get('/flowers/{flower}', [\App\Http\Controllers\FlowerController::class, 'show'])->name('pages.flower');
Route::get('/flowers', [\App\Http\Controllers\FlowerController::class, 'index'])->name('pages.flowers');

//Букеты
Route::get('/bouquets', [\App\Http\Controllers\BouquetController::class, 'index'])->name('pages.bouquets');
Route::get('/bouquets/{bouquet}', [\App\Http\Controllers\BouquetController::class,'show'])->name('pages.bouquet');

Route::post('/reviews', [\App\Http\Controllers\ReviewController::class, 'store']);


Route::middleware('auth')->group(function(){

    Route::get('/bouquet/create', [\App\Http\Controllers\BouquetController::class,'create'])->name('pages.bouquet-make');
    Route::post('/bouquets', [\App\Http\Controllers\BouquetController::class, 'store']);

    Route::get('/flower/create', [\App\Http\Controllers\FlowerController::class, 'create'])->name('pages.flower-make');
    Route::post('/flowers', [\App\Http\Controllers\FlowerController::class,'store']);

    Route::get('/orders/', [\App\Http\Controllers\OrderController::class, 'index'])->name('pages.orders');
    Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('pages.order');

    Route::get('/bouquets/{bouquet}/delete', [\App\Http\Controllers\BouquetController::class, 'destroy']);
    Route::get('/orders/{order}/delete', [\App\Http\Controllers\OrderController::class, 'destroy']);

    Route::get('/dashboard', function(){
       return  view('pages.dashboard');
    })->name('pages.dashboard');
});





