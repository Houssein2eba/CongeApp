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
use App\Livewire\Conges\Create;





//<<<<<<< HEAD

Route::get('/',function(){
    return view('welcome');
});
//=======
//Route::get('//', function() {
    // echo "hi";
//>>>>>>> 58c7c5e1dbd4d4f075b99afd827d1605ac2a3986
//});

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
        
            //Route::post('/conges/store', 'store')->name('conges.store');
            
            Route::post('/conges/store', [CongeController::class, 'store'])->name('conges.store');

        });
    });
});
//<<<<<<< HEAD
    // conges routes
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/conges', [CongeController::class, 'index'])->middleware('can:view_conges');
        Route::post('/conges', [CongeController::class, 'store'])->middleware('can:request_conge');
//=======

    // Employee routes with role middleware
    Route::prefix('employee')->name('employee.')->group(function() {
        Route::get('/dashboard', [EmployeeHomeController::class, 'index'])->name('dashboard');
        Route::get('/create-conge', [EmployeCongeController::class, 'create'])->name('create-conge');
//>>>>>>> 58c7c5e1dbd4d4f075b99afd827d1605ac2a3986
    });
    Route::middleware(['auth'])->group(function () {
        Route::get('/conges/create', [EmployeCongeController::class, 'create'])->name('conges.create');
        Route::post('/conges/store', [EmployeCongeController::class, 'store'])->name('conges.store');
    });
    

});


