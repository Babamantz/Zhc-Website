<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class OnlineService extends Model implements HasMedia
{
    //

    use InteractsWithMedia;

    public function registerMediaConversions(?Media $media = null): void
    {
        if (! $media || ! $media->getPath() || ! file_exists($media->getPath())) {
            return; // skip broken or missing media
        }

        $this->addMediaConversion('webp')
            ->format('webp')
            ->nonQueued()
            ->performOnCollections('poster_image');
    }
    protected $guarded = false;
}
