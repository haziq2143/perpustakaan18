<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReturnController;

Route::get('/', [AuthController::class, 'signIn']);
Route::get('/signUp', [AuthController::class, 'signUp']);

Route::get('/admin', [HomeController::class, 'index']);
Route::resource('/books', BookController::class);
Route::resource('/loans', LoanController::class);
Route::resource('/returns', ReturnController::class);
