<?php

namespace App\Providers;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot():void
    {
       RateLimiter::for('login',function(Request $request){
        return
    Limit::perMinute(5)->by($request->email ?:$request->ip());
       });
       Fortify::authenticateUsing(function (Request $request){
        $user=User::where('email',$request->email)->first();
        if($user && Hash::check($request->password,$user->password)){
            return $user;
        }
        return null;
       });
    }
}
