<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Property extends Model implements HasMedia
{
    //
    use InteractsWithMedia;
    protected $guarded = false;


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

    protected function title()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'title')
        );
    }
    protected function excerpt()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'excerpt')
        );
    }
    protected function content()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'content')
        );
    }
}
