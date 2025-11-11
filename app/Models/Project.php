<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    //
    use InteractsWithMedia;

    protected $guarded = false;
    protected static function booted()
    {
        static::saved(function ($project) {
            Cache::forget("project_{$project->slug}");
        });

        static::deleted(function ($project) {
            Cache::forget("project_{$project->slug}");
        });
    }

    protected function title()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'title')
        );
    }
    protected function projectName()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'slug')
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
            ->performOnCollections('project_images');

        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->performOnCollections('project_images');

        $this->addMediaConversion('medium')
            ->width(800)
            ->height(600)
            ->performOnCollections('project_images');

        $this->addMediaConversion('full')
            ->width(1600)
            ->height(1200)
            ->performOnCollections('project_images');
    }
}
