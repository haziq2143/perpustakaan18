<?php

use App\Models\Fine;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfileController;

Route::get('/', [AuthController::class, 'signIn']);
Route::get('/authentications', [AuthController::class, 'signUp']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/authentications', [AuthController::class, 'authentication']);
Route::post('/authentications/store', [AuthController::class, 'store']);


Route::get('/admin', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/books/search', [BookController::class, 'cari']);
Route::resource('/books', BookController::class);
Route::resource('/loans', LoanController::class);
Route::resource('/returns', ReturnController::class);

Route::post('/comments/{books}', [CommentController::class, 'store']);
Route::delete('/comments/{books}', [CommentController::class, 'destroy']);
Route::get('/fines/{fine}', [FineController::class, 'index']);
Route::post('/fines/{fine}', [FineController::class, 'store']);

Route::get('/export', [ExportController::class, 'export']);
