<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Cache;

class NewsObserver
{
    public function saved(News $news): void
    {
        Cache::forget('news_list');
    }

    public function deleted(News $news): void
    {
        Cache::forget('news_list');
    }

    // (Optional) also clear after restore if using SoftDeletes
    public function restored(News $news): void
    {
        Cache::forget('news_list');
    }
}
