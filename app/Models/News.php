<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;
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
     public function getRouteKeyName()
     {
          return 'slug';
     }
}
