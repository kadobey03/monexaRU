<?php

namespace App\Providers;

use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use App\Models\Settings;
use App\Models\SettingsCont;
use App\Models\TermsPrivacy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        FacadesStorage::extend('sftp', function ($app, $config) {
            return new Filesystem(new SftpAdapter($config));
        });

        Paginator::useBootstrap();

        // Register Jetstream Blade Components
        $this->registerJetstreamComponents();

        // Sharing settings with all view
        try {
            $settings = Settings::where('id', '1')->first();
            $terms = TermsPrivacy::find(1);
            $moreset = SettingsCont::find(1);

            View::share('settings', $settings);
            View::share('terms', $terms);
            View::share('moresettings', $moreset);
            View::share('mod', $settings->modules ?? null);
        } catch (\Exception $e) {
            // Database might not be ready during migrations or initial setup
            View::share('settings', null);
            View::share('terms', null);
            View::share('moresettings', null);
            View::share('mod', null);
        }
    }

    /**
     * Register Jetstream Blade Components
     */
    private function registerJetstreamComponents()
    {
        $components = [
            'jet-action-message' => 'jetstream::components.action-message',
            'jet-action-section' => 'jetstream::components.action-section',
            'jet-application-logo' => 'jetstream::components.application-logo',
            'jet-application-mark' => 'jetstream::components.application-mark',
            'jet-authentication-card' => 'jetstream::components.authentication-card',
            'jet-authentication-card-logo' => 'jetstream::components.authentication-card-logo',
            'jet-banner' => 'jetstream::components.banner',
            'jet-button' => 'jetstream::components.button',
            'jet-checkbox' => 'jetstream::components.checkbox',
            'jet-confirmation-modal' => 'jetstream::components.confirmation-modal',
            'jet-confirms-password' => 'jetstream::components.confirms-password',
            'jet-danger-button' => 'jetstream::components.danger-button',
            'jet-dialog-modal' => 'jetstream::components.dialog-modal',
            'jet-dropdown' => 'jetstream::components.dropdown',
            'jet-dropdown-link' => 'jetstream::components.dropdown-link',
            'jet-form-section' => 'jetstream::components.form-section',
            'jet-input' => 'jetstream::components.input',
            'jet-input-error' => 'jetstream::components.input-error',
            'jet-label' => 'jetstream::components.label',
            'jet-modal' => 'jetstream::components.modal',
            'jet-nav-link' => 'jetstream::components.nav-link',
            'jet-responsive-nav-link' => 'jetstream::components.responsive-nav-link',
            'jet-secondary-button' => 'jetstream::components.secondary-button',
            'jet-section-border' => 'jetstream::components.section-border',
            'jet-section-title' => 'jetstream::components.section-title',
            'jet-switchable-team' => 'jetstream::components.switchable-team',
            'jet-validation-errors' => 'jetstream::components.validation-errors',
            'jet-welcome' => 'jetstream::components.welcome',
        ];

        foreach ($components as $alias => $component) {
            Blade::component($component, $alias);
        }
    }
}