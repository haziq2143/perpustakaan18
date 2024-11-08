<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;


Route::get('/', [AuthController::class, 'signIn']);
Route::get('/signUp', [AuthController::class, 'signUp']);

Route::get('/admin', [HomeController::class, 'index']);
Route::resource('/books', BookController::class);
