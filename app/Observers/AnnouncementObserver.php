<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;


class AnnouncementObserver
{
    //

    public function created($aboutUs)
    {
        Cache::forget('announcements');
    }

    public function updated($aboutUs)
    {
        Cache::forget('announcements');
    }

    public function deleted($aboutUs)
    {
        Cache::forget('announcements');
    }
}
