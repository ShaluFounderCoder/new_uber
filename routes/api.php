<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UberController;

Route::post('/register',[UberController::class, 'register']);
Route::post('/login',[UberController::class, 'login']);
Route::get('/slider',[UberController::class, 'slider']);
Route::get('/user_profile/{id}',[UberController::class, 'user_profile']);
Route::post('/prof_update',[UberController::class, 'prof_update']);
Route::get('/service_type',[UberController::class, 'service_type']);
Route::post('/ride_request',[UberController::class, 'ride_request']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


