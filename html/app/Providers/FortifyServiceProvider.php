<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
// use App\Actions\Fortify\ResetUserPassword;
// use App\Actions\Fortify\UpdateUserPassword;
// use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;

use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use App\Models\User;
use Laravel\Fortify\Http\Requests\LoginRequest;




class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                return redirect('/');
            }
        });
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
            public function toResponse($request)
            {
                return redirect('/');
            }
        });
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(10)->by($email.$request->ip());
        });
        Fortify::registerView(function () {
            return view('Register.index');
        });
    
        Fortify::loginView(function () {
            return view('Login.index');
        });
        #認証コード
        Fortify::authenticateUsing(function (LoginRequest $request) {
            $user = User::where('email', $request->email)->first();
    
            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
        });
    

    }
}
