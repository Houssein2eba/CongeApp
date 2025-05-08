<?php

use App\Http\Controllers\Conge\EmployeCongeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmployesController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CongeController;

Route::get('/', function() {
    return view('welcome');
});

Route::middleware(['auth'])->group(function() {
    Route::prefix('admin')->name('admin.')->group(function() {
        Route::get('/home', [DashboardController::class, 'index'])->name('home');
        
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
});

Route::middleware(['auth'])->group(function() {
    Route::get('/create-conge',[EmployeCongeController::class, 'create'])->name('create-conge');
});


