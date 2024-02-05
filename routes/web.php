<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\educationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('visitor/home');
});

Route::get('/restricted', function(){
    return view('auth/landing-page');
});

Route::get('/login',[AdminAuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration',[AdminAuthController::class,'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-user',[AdminAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[AdminAuthController::class,'loginUser'])->name('login-user');

// Admin page view
Route::prefix('/dashboard')->middleware('isLoggedIn')->group(function () {
    // Dashboard main page
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    // Route for creating about yourself
    Route::get('/about', [AdminAuthController::class, 'createAbout'])->name('create-about');

    //Route for education
    Route::prefix('/education')->group(function(){
        Route::get('/createEdu', [educationController::class, 'createEdu'])->name('create-edu');
        Route::post('/storeEdu', [educationController::class, 'storeEdu'])->name('store-edu');
    });
});
Route::get('/logout',[AdminAuthController::class,'logoutUser']);