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
})->name('welcome');


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
        Route::get('/employes', [EmployesController::class, 'index'])->name('employe.index');
        Route::get('/employes/create', [EmployesController::class, 'create'])->name('employe.create');
        Route::get('/employes/{id}', [EmployesController::class, 'show'])->name('employe.show');
        Route::get('/employes/{id}/edit', [EmployesController::class, 'edit'])->name('employe.edit');
        Route::put('/employes/{id}', [EmployesController::class, 'update'])->name('employe.update');
        Route::delete('/employes/{id}', [EmployesController::class, 'destroy'])->name('employe.destroy');
        Route::post('/employes/store', [EmployesController::class, 'store'])->name('employe.store');

        // Departements routes
        Route::resource('departement', DepartementController::class);
        

        // Conges routes
        Route::controller(CongeController::class)->group(function() {
            Route::get('/conges', 'index')->name('conges.index');



        });
    });
});


    Route::middleware(['auth'])->group(function () {

    Route::prefix('employe')->name('employe.')->group(function () {
        Route::get('/dashboard', [EmployeeHomeController::class, 'index'])->name('dashboard');
        Route::get('/conges', [EmployeCongeController::class, 'index'])->name('conge.index');
        Route::get('/conges/create', [EmployeCongeController::class, 'create'])->name('conge.create');
        Route::post('/conges/store', [EmployeCongeController::class, 'store'])->name('conge.store');
    });


});


