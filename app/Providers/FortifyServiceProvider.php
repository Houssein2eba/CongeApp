<?php

namespace App\Providers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginViewResponse;
class FortifyServiceProvider extends ServiceProvider
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
    public function boot(){
        Fortify::loginView(function(){
            return view('login');
        });


        
          Fortify::authenticateUsing(function (Request $request){
            $user=User::where('email',$request->email)->first();
            if ($user && Hash::check($request->password,$user->password)){
                return $user;
            }
            
        });
        Fortify::registerView(function(Request $request){
            return view('auth.register');
        });
        /**this->app->singleton(\Laravel\Fortify\Contracts\LoginViewResponse::class,function(){
            return new class implements \Laravel\Fortify\Contracts\LoginViewResponse{
                public function toResponse($request)
                {
                    return view('login');
                }
            };
            
        });

        
    
    }}
 **/
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
        Fortify::loginView(function (){
            return view('login');
        });
    }
}
