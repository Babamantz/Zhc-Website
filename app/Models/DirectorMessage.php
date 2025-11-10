<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DirectorMessage extends Model implements HasMedia
{
    //
    use InteractsWithMedia;

    protected $guarded = false;


    protected function title()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'title')
        );
    }
    protected function slug()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'slug')
        );
    }
    protected function content()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'content')
        );
    }



    public function registerMediaConversions(?Media $media = null): void
    {

        $this->addMediaConversion('webp')
            ->format('webp')
            ->performOnCollections('director_images');
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->performOnCollections('director_images');

        $this->addMediaConversion('medium')
            ->width(800)
            ->height(600)
            ->shouldBePerformedOn('director_images');
    }
}
