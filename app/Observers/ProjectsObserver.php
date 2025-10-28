<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class ProjectsObserver
{
    //

    public function created($nproject)
    {
        Cache::forget('projects');
    }

    public function updated($projects): void
    {
        Cache::forget('projects');
    }

    public function deleted($projects)
    {
        Cache::forget('projects');
    }
}
