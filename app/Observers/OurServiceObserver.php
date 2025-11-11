<?php

namespace App\Observers;

use App\Models\OurService;
use Illuminate\Support\Facades\Cache;

class OurServiceObserver
{
    //

    public function saved(OurService $ourService): void
    {
        Cache::forget('our_services');
    }

    public function deleted(OurService $ourService): void
    {
        Cache::forget('our_services');
    }

    // (Optional) also clear after restore if using SoftDeletes
    public function restored(OurService $ourService): void
    {
        Cache::forget('our_services');
    }
}
