<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class OurFaqObserver
{


    public function created($nproject)
    {
        Cache::forget('our_faq');
    }

    public function updated($projects): void
    {
        Cache::forget('our_faq');
    }

    public function deleted($projects)
    {
        Cache::forget('our_faq');
    }
}
