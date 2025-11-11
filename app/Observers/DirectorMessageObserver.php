<?php

namespace App\Observers;

use App\Models\DirectorMessage;
use Illuminate\Support\Facades\Cache;

class DirectorMessageObserver
{
    public function saved(DirectorMessage $dMessage): void
    {
        Cache::forget('director_message');
    }

    public function deleted(DirectorMessage $dMessage): void
    {
        Cache::forget('director_message');
    }

    // (Optional) also clear after restore if using SoftDeletes
    public function restored(DirectorMessage $dMessage): void
    {
        Cache::forget('director_message');
    }
}
