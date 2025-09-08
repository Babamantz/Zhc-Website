<?php

namespace App\Traits;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasStandardMediaConversions
{
    use InteractsWithMedia;

    /**
     * Register standard media conversions based on model type.
     */
    public function registerMediaConversions(Media $media = null): void
    {
        
        $type = $this->mediaType ?? 'default';

        switch ($type) {
            case 'banner':
                $this->addMediaConversion('thumb')
                    ->width(400)->height(200);

                $this->addMediaConversion('medium')
                    ->width(1200)->height(600);

                $this->addMediaConversion('full')
                    ->width(1920)->height(1080);
                break;

            case 'poster':
                $this->addMediaConversion('thumb')
                    ->width(300)->height(400);

                $this->addMediaConversion('medium')
                    ->width(800)->height(1000);

                $this->addMediaConversion('full')
                    ->width(1200)->height(1600);
                break;

            case 'profile':
                $this->addMediaConversion('thumb')
                    ->width(150)->height(150);

                $this->addMediaConversion('medium')
                    ->width(400)->height(500);

                $this->addMediaConversion('full')
                    ->width(800)->height(1000);
                break;

            case 'blog':
                $this->addMediaConversion('thumb')
                    ->width(400)->height(300);

                $this->addMediaConversion('medium')
                    ->width(800)->height(600);

                $this->addMediaConversion('full')
                    ->width(1200)->height(900);
                break;

            default: // fallback generic
                $this->addMediaConversion('thumb')
                    ->width(400)->height(300);

                $this->addMediaConversion('medium')
                    ->width(800)->height(600);

                $this->addMediaConversion('full')
                    ->width(1600)->height(1200);
        }
    }
}
