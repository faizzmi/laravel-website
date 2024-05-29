<?php

use App\Http\Controllers\picController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\skillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\visitorController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\awardController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\expController;


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

Route::get('/',[visitorController::class,'visitorDashboard']);
Route::get('/resume', function () {return view('visitor/pdfView');});
Route::get('/projects',[visitorController::class,'listProjects'])->name('projects');
Route::get('/projects/{project}', [visitorController::class,'viewProjects'])->name('view-detail');
Route::get('/awards',[visitorController::class,'listAwards']);
// Route::get('/',[visitorController::class,'contactUser']);


Route::get('/restricted', function(){return view('auth/landing-page');});


//
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
        Route::get('/{project}', [projectController::class, 'viewProject'])->name('view-project');
        Route::get('c/create', [projectController::class, 'createProject'])->name('create-project');
        Route::post('/store', [projectController::class, 'storeProject'])->name('store-project');
        Route::get('/edit/{project}', [projectController::class, 'editeProject'])->name('edit-project');
        Route::put('/update/{project}', [projectController::class, 'updateProject'])->name('update-project');
        Route::delete('/delete/{project}', [projectController::class, 'destroyProject'])->name('delete-project');
        Route::delete('/skills/{id}', [skillController::class, 'destroy'])->name('skills-destroy');
        Route::post('c/create/upload', [picController::class, 'upload'])->name('upload');
    });

    //Route for award
    Route::prefix('/award')->group(function () {
        Route::get('/', [awardController::class, 'awardDashboard'])->name('award-dashboard');
        Route::get('/create', [awardController::class,'createAward'])->name('create-award');
        Route::post('/store', [awardController::class, 'storeAward'])->name('store-award');
        Route::get('/edit/{award}', [awardController::class, 'editAward'])->name('edit-award');
        Route::put('/update/{award}', [awardController::class, 'updateAward'])->name('update-award');
        Route::delete('/delete/{award}', [awardController::class, 'destroyAward'])->name('delete-award');
    });

    //Route for experience
    Route::prefix('/experience')->group(function () {
        Route::get('/create', [expController::class,'createExp'])->name('create-experience');
        Route::post('/store', [expController::class, 'storeExp'])->name('store-experience');
        Route::get('/edit/{experience}', [expController::class, 'editExp'])->name('edit-experience');
        Route::put('/update/{experience}', [expController::class, 'updateExp'])->name('update-experience');
        Route::delete('/delete/{experience}', [expController::class, 'destroyExp'])->name('delete-experience');
    });

    //Route for contact
    Route::prefix('/contact')->group(function () {
        Route::get('/create', [contactController::class,'createContact'])->name('create-contact');
        Route::post('/store', [contactController::class, 'storeContact'])->name('store-contact');
        Route::get('/edit/{contact}', [contactController::class, 'editContact'])->name('edit-contact');
        Route::put('/update/{contact}', [contactController::class, 'updateContact'])->name('update-contact');
        Route::delete('/delete/{contact}', [contactController::class, 'destroyContact'])->name('delete-contact');
    });
    
    //Logout
    Route::get('/logout',[AdminAuthController::class,'logoutUser']);
}); 