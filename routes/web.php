<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['reset' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('borrowers', BorrowerController::class);
Route::resource('books', BookController::class);