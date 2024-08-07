<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/dashboard/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::get('/journal', [JurnalController::class, 'index'])->name('journal.index');
    Route::resource('/journal', JurnalController::class)->except(['show', 'create']);
});

Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
