<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Announcement extends Model implements HasMedia
{
    //
    use InteractsWithMedia;
    protected $guarded = false;

   public function getDateForHumansAttribute()
{
    return $this->created_at->format('Y-m-d') ;
}

}
