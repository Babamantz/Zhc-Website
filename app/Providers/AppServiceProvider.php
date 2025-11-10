<?php

namespace App\Providers;

use App\Models\DirectorMessage;
use Filament\Support\Assets\Css;
use Illuminate\Support\ServiceProvider;
use App\Observers\DirectorMessageObserver;
use Filament\Support\Facades\FilamentAsset;

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
        //
        DirectorMessage::observe(DirectorMessageObserver::class);

        FilamentAsset::register([
            Css::make('custom-stylesheet', __DIR__ . '/../../resources/css/filament.css'),
        ]);
    }
}
