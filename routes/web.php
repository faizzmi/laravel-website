<?php

use App\Http\Controllers\projectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\adminDashboardController;


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
//->middleware('alreadyLoggedIn');middleware('isLoggedIn')->
Route::get('/login',[AdminAuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/registration',[AdminAuthController::class,'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-user',[AdminAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[AdminAuthController::class,'loginUser'])->name('login-user');

// Admin page view
Route::prefix('/dashboard')->middleware('isLoggedIn')->group(function () {
    // Dashboard main page
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    // Route for creating about yourself
    Route::get('/edit/{user}', [AdminAuthController::class, 'editUser'])->name('edit-user');
    Route::put('/update/{user}', [AdminAuthController::class, 'updateUser'])->name('update-user');

    //Route for education
    Route::prefix('/education')->group(function(){
        Route::get('/create', [educationController::class, 'createEdu'])->name('create-edu');
        Route::post('/store', [educationController::class, 'storeEdu'])->name('store-edu');
        Route::get('/edit/{education}', [educationController::class, 'editEdu'])->name('edit-edu');
        Route::put('/update/{education}', [educationController::class, 'updateEdu'])->name('update-edu');
        Route::delete('/delete/{education}', [EducationController::class, 'destroyEdu'])->name('delete-edu');
    });

    //Route for project
    Route::prefix('/project')->group(function () {
        Route::get('/', [projectController::class, 'projectDashboard'])->name('project-dashboard');
        Route::get('/create', [projectController::class,'createProject'])->name('create-project');
        Route::post('/store', [projectController::class, 'storeProject'])->name('store-project');
        Route::get('/edit/{project}', [projectController::class, 'editeProject'])->name('edit-project');
        Route::put('/update/{project}', [projectController::class, 'updateProject'])->name('update-project');
        Route::delete('/delete/{project}', [projectController::class, 'destroyProject'])->name('delete-project');
    });

    //Logout
    Route::get('/logout',[AdminAuthController::class,'logoutUser']);
});