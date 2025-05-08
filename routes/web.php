<?php

use App\Http\Controllers\Conge\CongeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EmployesController;


Route::get('/',function(){
    return view('welcome');
});
Route::get('/employes',[EmployesController::class,'index']);
Route::get('/employes/create',[EmployesController::class,'create']);
Route::prefix("admin")->middleware('auth')->group(function() {
    Route::get('/home',[DashboardController::class,'index'])->name('home');

    //employes routes
    Route::prefix("employes")->name('employes.')->group(function(){
        Route::get('/',[EmployesController::class,'index'])->name('index');
        Route::get('/create',[EmployesController::class,'create'])->name('create');
        Route::get('/{id}',[EmployesController::class,'show'])->name('show');
        Route::get('/{id}/edit',[EmployesController::class,'edit'])->name('edit');
        Route::put('/{id}',[EmployesController::class,'update'])->name('update');
        Route::delete('/{id}',[EmployesController::class,'destroy'])->name('destroy');
        Route::post('/',[EmployesController::class,'store'])->name('store');
    });
    //departement routes
    Route::prefix("departements")->name('departements.')->group(function(){
        Route::get('/',[DepartementController::class,'index'])->name('index');
        Route::get('/create',[DepartementController::class,'create'])->name('create');
        Route::get('/{id}',[DepartementController::class,'show'])->name('show');
        Route::get('/{id}/edit',[DepartementController::class,'edit'])->name('edit');
        Route::put('/{id}',[DepartementController::class,'update'])->name('update');
        Route::delete('/{id}',[DepartementController::class,'destroy'])->name('destroy');
        Route::post('/',[DepartementController::class,'store'])->name('store');
    });
    // conges routes
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/conges', [CongeController::class, 'index'])->middleware('can:view_conges');
        Route::post('/conges', [CongeController::class, 'store'])->middleware('can:request_conge');
    });


});




