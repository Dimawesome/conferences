<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ArticleController;

Route::resource('articles', ArticleController::class);

Route::get('/about', \App\Http\Controllers\AboutController::class);

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
