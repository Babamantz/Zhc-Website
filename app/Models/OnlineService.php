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

         $this->addMediaConversion('webp')
            ->format('webp')
            ->performOnCollections('poster_image');
    }
    protected $guarded = false;
}
