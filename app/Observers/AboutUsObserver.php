<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class AboutUsObserver
{

    public function created($aboutUs)
    {
        Cache::forget('about_zhc');
    }

    public function updated($aboutUs)
    {
        Cache::forget('about_zhc');
    }

    public function deleted($aboutUs)
    {
        Cache::forget('about_zhc');
    }
}
