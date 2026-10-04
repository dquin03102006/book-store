<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
Route::get('/', [HomeController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);