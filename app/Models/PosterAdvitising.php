<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PosterAdvitising extends Model  implements HasMedia
{
    //
    use InteractsWithMedia;

    protected $table = "posters_advitising";
    
    public function registerMediaConversions(?Media $media = null): void 
    { 

         $this->addMediaConversion('webp')
            ->format('webp')
            ->performOnCollections('poster_image');
    }

    protected $fillable = [
        "title",
        "alt",
        "poster_image"
    ];
}
