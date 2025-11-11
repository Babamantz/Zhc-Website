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
        if ($media === null) {
            return;
        }

        $this->addMediaConversion('webp')
            ->format('webp')
            ->nonQueued() // Add this line
            ->performOnCollections('board_images');

        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->nonQueued()
            ->performOnCollections('board_images');
    }
}
