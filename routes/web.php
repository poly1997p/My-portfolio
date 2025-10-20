<?php

use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\AdminauthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\backend\SkillController;
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

//Dashboard...........
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);

//About........
Route::get('/admin/about', [AboutController::class, 'adminAbout']);
 Route::post('/about/update', [AboutController::class, 'update']);

Route::post('/skill/store', [AboutController::class, 'skillStore']);
Route::get('/skill/delete/{id}', [AboutController::class, 'skillDelete']);

//portfolio....
Route::get('/admin/portfolio',[PortfolioController::class, 'portfolio']);
Route::post('/portfolio/store',[PortfolioController::class, 'store']);
Route::post('/portfolio/overview',[PortfolioController::class, 'overview']);
Route::get('/portfolio/edit/{id}',[PortfolioController::class, 'edit']);
Route::post('/portfolio/update/{id}',[PortfolioController::class, 'update']);
Route::get('/portfolio/delete/{id}',[PortfolioController::class, 'destroy']);