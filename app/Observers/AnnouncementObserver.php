<?php

namespace App\Observers;

use App\Models\Announcement;
use Illuminate\Support\Facades\Cache;


class AnnouncementObserver
{
    public function saved(Announcement $announcement): void
    {
        Cache::forget('announcements');
    }

    public function deleted(Announcement $announcement): void
    {
        Cache::forget('announcements');
    }

    // (Optional) also clear after restore if using SoftDeletes
    public function restored(Announcement $announcement): void
    {
        Cache::forget('announcements');
    }
}
