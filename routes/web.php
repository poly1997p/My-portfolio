<?php

use App\Http\Controllers\backend\AdminauthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[FrontendController::class, 'index']);
Route::get('/about',[FrontendController::class, 'about']);
Route::get('/resume',[FrontendController::class, 'resume']);
Route::get('/services',[FrontendController::class, 'services']);
Route::get('/service-details',[FrontendController::class, 'serviceDetails']);
Route::get('/portfolio-details',[FrontendController::class, 'portfolioDetails']);
Route::get('/contact',[FrontendController::class, 'contact']);

//admin-login

Route::get('/admin/login',[AdminauthController::class, 'adminLogin']);
Route::get('/admin/logout',[AdminauthController::class, 'adminLogout']);



Auth::routes();


Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
