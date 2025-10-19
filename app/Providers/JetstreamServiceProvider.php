<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\DB;
use App\Models\Settings;
use hisorange\BrowserDetect\Parser as Agent;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();
        Jetstream::deleteUsersUsing(DeleteUser::class);

        // Load Jetstream views
        $this->loadViewsFrom(resource_path('views/vendor/jetstream'), 'jetstream');

        Fortify::loginView(function () {
            return view('auth.login', [
                'title' => 'Sign In to Continue',
                'settings' => Settings::where('id', '1')->first(),
            ]);
        });


        Fortify::authenticateUsing(function (Request $request) {
             $user = User::where('email', $request->email) ->orWhere('username', $request->email)->first();
            // $user = User::where('email', $request->email)->first();
            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                $request->session()->put('getAnouc', 'true');
                DB::table('activities')->insert([
                    'user' => $user->id,
                    'ip_address' => $request->ip(),
                    'device' => Agent::deviceModel() ?: 'Unknown',
                    'browser' => Agent::browserName(),
                    'os' => Agent::platformName(),
                ]);
                return $user;
            }
        });


        Fortify::registerView(function () {
            include 'currencies.php';
            return view('auth.register', [
                'title' => 'Register an Account',
                'currencies' => $currencies,
                'settings' => Settings::where('id', '1')->first(),
            ]);
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
