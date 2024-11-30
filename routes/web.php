<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UbeController;



Route::get('/index', [UbeController::class, 'index'])->name('index');
Route::get('/login', [UbeController::class, 'login'])->name('login');
Route::post('/store', [UbeController::class, 'store'])->name('store');
// user-route
Route::get('/user',[UbeController::class, 'user'])->name('user');
Route::get('/slider',[UbeController::class, 'slider'])->name('slider');



