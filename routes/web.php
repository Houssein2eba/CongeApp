<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EmployesController;

Route::get('/',function(){
    return view('welcome');
});
Route::get('/employes',[EmployesController::class,'index']);
Route::get('/employes/create',[EmployesController::class,'create']);
Route::prefix("admin")->middleware('auth')->group(function() {
    Route::get('/home',function(){
        return view('home');
    });

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

});

   // Route::post("/login", [EmployeController::class, "showLoginForm"])->name('login.post');
    //Route::get("/home", [EmployeController::class, "home"])->name('home');
   // Route::middleware('auth')->group(function()
   // {
        //Route::get('/home', function(){
          //  return view('home');
        //  Route::get("/home", [EmployeController::class, "home"])->name('home');

      //  });




