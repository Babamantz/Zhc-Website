<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class DirectorMessageObserver
{

    public function created($dMessage)
    {
        Cache::forget('director_message');
    }

    public function updated($dMessage): void
    {
        Cache::forget('director_message');
    }

    public function deleted($dMessage)
    {
        Cache::forget('director_message');
    }
}
