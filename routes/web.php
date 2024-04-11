<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\developer\DeveloperController;
use App\Http\Middleware\{DeveloperMiddleware,ClientMiddleware,AdminMiddleware};


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::prefix('client')->middleware(['auth','isClient'])->group(function(){
    route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
});

Route::prefix('developer')->middleware(['isDeveloper'])->group(function(){
    route::get('/dashboard', [DeveloperController::class, 'dashboard'])->name('developer.dashboard');
});

