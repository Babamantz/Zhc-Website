<?php

namespace App\Observers;

use App\Models\OurFaq;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class OurFaqObserver
{
    public function saved(OurFaq $ourFaq): void
    {
        Cache::forget('our_faq');
    }

    public function deleted(OurFaq $ourFaq): void
    {
        Cache::forget('our_faq');
    }

    // (Optional) also clear after restore if using SoftDeletes
    public function restored(OurFaq $ourFaq): void
    {
        Cache::forget('our_faq');
    }
}
