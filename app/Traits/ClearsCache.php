<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait ClearsCache
{
    protected function clearCache(string|array $keys): void
    {
        foreach ((array) $keys as $key) {
            Cache::forget($key);
        }
    }
}
