<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Announcement extends Model implements HasMedia
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
    protected function announcement()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'announcement')
        );
    }

    public function getDateForHumansAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }
}
