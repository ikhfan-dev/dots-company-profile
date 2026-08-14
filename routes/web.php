<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/lang/{lang}', [HomeController::class, 'switchLang'])->name('lang.switch');
Route::post('/contact', [InquiryController::class, 'store'])->name('contact.store');
