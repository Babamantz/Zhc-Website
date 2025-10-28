<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class OurServiceObserver
{
    //

    public function created($nproject)
    {
        Cache::forget('our_services');
    }

    public function updated($projects): void
    {
        Cache::forget('our_services');
    }

    public function deleted($projects)
    {
        Cache::forget('our_services');
    }
}
