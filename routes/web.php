<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendController::class, 'index']);
Route::get('/about',[FrontendController::class, 'about']);
Route::get('/resume',[FrontendController::class, 'resume']);
Route::get('/services',[FrontendController::class, 'services']);
Route::get('/service-details',[FrontendController::class, 'serviceDetails']);
Route::get('/portfolio-details',[FrontendController::class, 'portfolioDetails']);
Route::get('/contact',[FrontendController::class, 'contact']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
