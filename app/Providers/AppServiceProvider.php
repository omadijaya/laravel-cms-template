<?php

namespace App\Providers;

use App\Settings\GeneralSettings;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        // Dynamically set the app name for Filament
        Filament::serving(function () {
            $generalSettings = app(GeneralSettings::class);

            config(['app.name' => $generalSettings->site_name]);
            Filament::registerRenderHook('filament::branding.name', fn () => $generalSettings->site_name);
            Gate::policy(\Datlechin\FilamentMenuBuilder\Models\Menu::class, \App\Policies\MenuPolicy::class);
        });
    }
}
