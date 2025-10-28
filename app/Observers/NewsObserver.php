<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class NewsObserver
{
    public function created($news)
    {
        Cache::forget('news_list');
    }

    public function updated($news): void
    {
        Cache::forget('news_list');
    }

    public function deleted($news)
    {
        Cache::forget('news_list');
    }
}
