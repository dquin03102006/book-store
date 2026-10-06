<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);

Route::post('/review', [ReviewController::class, 'store'])->middleware('auth');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->middleware('auth');