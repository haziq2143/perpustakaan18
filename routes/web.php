<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReturnController;
use App\Models\Fine;

Route::get('/', [AuthController::class, 'signIn']);
Route::get('/authentications', [AuthController::class, 'signUp']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/authentications', [AuthController::class, 'authentication']);
Route::post('/authentications/store', [AuthController::class, 'store']);

Route::get('/admin', [HomeController::class, 'index']);
Route::get('/books/search', [BookController::class, 'cari']);
Route::resource('/books', BookController::class);
Route::resource('/loans', LoanController::class);
Route::resource('/returns', ReturnController::class);

Route::get('/fines/{fine}', [FineController::class, 'index']);
Route::post('/fines/{fine}', [FineController::class, 'store']);
