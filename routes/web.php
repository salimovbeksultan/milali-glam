<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::resource('orders', OrderController::class);
