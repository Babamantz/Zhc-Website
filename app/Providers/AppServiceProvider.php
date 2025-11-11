<?php

namespace App\Providers;

use App\Models\News;
use App\Models\OurFaq;
use App\Models\AboutUs;
use App\Models\OurService;
use App\Models\Announcement;
use App\Models\DirectorMessage;
use App\Observers\NewsObserver;
use Filament\Support\Assets\Css;
use App\Observers\OurFaqObserver;
use App\Observers\AboutUsObserver;
use App\Observers\OurServiceObserver;
use App\Observers\AnnouncementObserver;
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
        Announcement::observe(AnnouncementObserver::class);
        OurFaq::observe(OurFaqObserver::class);
        News::observe(NewsObserver::class);
        AboutUs::observe(AboutUsObserver::class);
        OurService::observe(OurServiceObserver::class);

        FilamentAsset::register([
            Css::make('custom-stylesheet', __DIR__ . '/../../resources/css/filament.css'),
        ]);
    }
}
