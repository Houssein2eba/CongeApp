<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Conge\EmployeCongeController;
use App\Http\Controllers\EmployeeHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmployesController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CongeController;

Route::get('/', function() {
     echo "hi";
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Routes
Route::middleware(['auth'])->group(function() {
    // Admin routes with role middleware
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Employes routes
        Route::resource('employes', EmployesController::class);
        
        // Departements routes
        Route::resource('departements', DepartementController::class);
        
        // Conges routes
        Route::controller(CongeController::class)->group(function() {
            Route::get('/conges', 'index')->name('conges.index');
            Route::get('/conges/create', 'create')->name('conges.create');
            Route::post('/conges/store', 'store')->name('conges.store');
        });
    });

    // Employee routes with role middleware
    Route::prefix('employee')->name('employee.')->group(function() {
        Route::get('/dashboard', [EmployeeHomeController::class, 'index'])->name('dashboard');
        Route::get('/create-conge', [EmployeCongeController::class, 'create'])->name('create-conge');
    });
});


