<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;


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
Route::get('/dashboard',[AdminAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[AdminAuthController::class,'logoutUser']);