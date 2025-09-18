<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class HelpCenter extends Model implements HasMedia
{
    //
    use InteractsWithMedia;

    protected $guarded = false;

    protected $casts = [
        'phones' => 'array'
    ];
}
