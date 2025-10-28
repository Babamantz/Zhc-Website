<?php

namespace App\Models;

use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AboutUs extends Model
{
    //
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

   
}
