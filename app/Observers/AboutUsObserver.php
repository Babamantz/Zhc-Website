<?php

namespace App\Observers;

use App\Models\AboutUs;
use Illuminate\Support\Facades\Cache;

class AboutUsObserver
{
    public function saved(AboutUs $about_us): void
    {
        Cache::forget('about_zhc');
    }

    public function deleted(AboutUs $about_us): void
    {
        Cache::forget('about_zhc');
    }

    // (Optional) also clear after restore if using SoftDeletes
    public function restored(AboutUs $about_us): void
    {
        Cache::forget('about_zhc');
    }
}
