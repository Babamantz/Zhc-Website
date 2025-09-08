<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;

class Hero extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

     public function registerMediaConversions(?Media $media = null): void 
    { 

         $this->addMediaConversion('webp')
            ->format('webp')
            ->performOnCollections('hero_image');
    }


    protected $guarded = false;

    protected $casts = [ 

        'img_hero' => 'array'

    ];
    //
   
}
