<?php

namespace App\Models;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = ['name','location'];

    public function items()
    {
        return $this->hasMany(MenuItem::class)->whereNull('parent_id')->orderBy('order');
    }
}
