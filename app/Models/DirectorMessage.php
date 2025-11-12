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
        if (! $media || ! $media->getPath() || ! file_exists($media->getPath())) {
            return; // skip broken or missing media
        }

        $this->addMediaConversion('webp')
            ->format('webp')
            ->nonQueued() // or ->queued() if you have queue workers
            ->performOnCollections('director_images');

        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->nonQueued()
            ->performOnCollections('director_images');

        $this->addMediaConversion('medium')
            ->width(800)
            ->height(600)
            ->nonQueued()
            ->performOnCollections('director_images');
    }
}
