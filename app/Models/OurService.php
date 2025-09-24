<?php

namespace App\Models;

use Mews\Purifier\Facades\Purifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class OurService extends Model
{
    //
    protected $table = "services";

    protected $guarded = false;


    protected function header()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'title')
        );
    }

    protected function content()
    {
        return Attribute::make(
            set: fn(string $value) => Purifier::clean($value, 'content')
        );
    }
}
