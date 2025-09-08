<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    //
      use InteractsWithMedia;
    protected $guarded = false;

    public function registerMediaConversions(?Media $media = null): void 
    { 

         $this->addMediaConversion('webp')
            ->format('webp')
            ->performOnCollections('news');
            
    $this->addMediaConversion('thumb')
         ->width(400)
         ->height(300)
         ->performOnCollections('news');

    $this->addMediaConversion('medium')
         ->width(800)
         ->height(600)
         ->performOnCollections('news');

    $this->addMediaConversion('full')
         ->width(1600)
         ->height(1200)
         ->performOnCollections('news');
    }
}
