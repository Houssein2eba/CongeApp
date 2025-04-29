<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
class RouteServiceProvider extends ServiceProvider{
    
    
    /**
     *  @var string
     * 
     */
    public const Home ='admin/home';
    
    /**
     * @var string/null
     * 
     * 
     */
    protected $namespace= 'App\Http\Controllers';
    /**
     * @return void
     */
    public function boot()
    {
        $this->routes(function(){
          //  Route::middleware('web')->namespace($this->namespace)->group(base_path('routes/web.php'));
            Route::middleware('api')->namespace($this->namespace)->group(base_path('routes/api.php'));
        });
    }
}