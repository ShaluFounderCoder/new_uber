<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



Route::get('/index', [AdminController::class, 'index'])->name('index');
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/store', [AdminController::class, 'store'])->name('store');
Route::get('/user',[AdminController::class, 'user'])->name('user');
Route::get('/driver',[AdminController::class,'driver'])->name('driver');
Route::get('/booking',[AdminController::class,'booking'])->name('booking');
Route::post('/slider',[AdminController::class, 'slider'])->name('slider');









