<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\{AdminController, IndustryController, IndustryTypeController, TypeController, TechnologyController, TechnologyTypeController, ServiceController, ServiceTypeController};
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\developer\DeveloperController;
use App\Http\Middleware\{DeveloperMiddleware,ClientMiddleware,AdminMiddleware};



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/technology', [HomeController::class, 'technologyInfo'])->name('technology.info');
Route::get('/service', [HomeController::class, 'serviceInfo'])->name('service.info');
Route::get('/solution', [HomeController::class, 'solutionInfo'])->name('solution.info');
Route::get('/industry', [HomeController::class, 'industryInfo'])->name('industry.info');

Route::prefix('admin')->middleware(['auth','isAdmin'])->name('admin.')->group(function(){
    route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('technology_type', TechnologyTypeController::class);
    Route::resource('technology', TechnologyController::class);
    Route::resource('service_type', ServiceTypeController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('industry_type', IndustryTypeController::class);
    Route::resource('industry', IndustryController::class);
});

Route::prefix('client')->middleware(['auth','isClient'])->group(function(){
    route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
});

Route::prefix('developer')->middleware(['isDeveloper'])->group(function(){
    route::get('/dashboard', [DeveloperController::class, 'dashboard'])->name('developer.dashboard');
});

