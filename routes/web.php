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
    Route::resource('employes',EmployesController::class);

});

   // Route::post("/login", [EmployeController::class, "showLoginForm"])->name('login.post');
    //Route::get("/home", [EmployeController::class, "home"])->name('home');
   // Route::middleware('auth')->group(function()
   // {
        //Route::get('/home', function(){
          //  return view('home');
        //  Route::get("/home", [EmployeController::class, "home"])->name('home');
    
      //  });
      



 