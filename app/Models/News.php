<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
     //
     use InteractsWithMedia;
     protected $guarded = false;

     protected function casts(): array
     {
          return [
               'title' => 'string',
               'date' => 'string',
               'content' => 'string',
               'excerpt' => 'string',
          ];
     }




     protected function title(): Attribute
     {
          return Attribute::make(
               set: fn(string $value) => Purifier::clean($value, 'title')
          );
     }
     protected function date()
     {
          return Attribute::make(
               set: fn(string $value) => Purifier::clean($value, 'date')
          );
     }
     protected function content(): Attribute
     {
          return Attribute::make(
               set: fn(string $value) => Purifier::clean($value, 'content')
          );
     }
     protected function excerpt(): Attribute
     {
          return Attribute::make(
               set: fn(string $value) => Purifier::clean($value, 'excerpt')
          );
     }
     protected static function booted()
     {
          static::saved(function ($news) {
               Cache::forget('news_list');
          });

          static::deleted(function ($news) {
               Cache::forget('news_list');
          });
     }

     public function registerMediaConversions(?Media $media = null): void
     {
          // Add null check - conversions only run when media exists
          if ($media === null) {
               return;
          }

          $this->addMediaConversion('webp')
               ->format('webp')
               ->nonQueued() // or ->queued() if you have queue workers
               ->performOnCollections('news');

          $this->addMediaConversion('thumb')
               ->width(400)
               ->height(300)
               ->nonQueued()
               ->performOnCollections('news');

          $this->addMediaConversion('medium')
               ->width(800)
               ->height(600)
               ->nonQueued()
               ->performOnCollections('news');

          $this->addMediaConversion('full')
               ->width(1600)
               ->height(1200)
               ->nonQueued()
               ->performOnCollections('news');
     }
     public function getRouteKeyName()
     {
          return 'slug';
     }
}
