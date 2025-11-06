<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BoardMember extends Model implements HasMedia
{
    //
    use InteractsWithMedia;

    protected $guarded = false;



    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->performOnCollections('board_images')
            ->nonQueued(); // Add this line

        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->performOnCollections('board_images')
            ->nonQueued(); // Add this line
    }
}
