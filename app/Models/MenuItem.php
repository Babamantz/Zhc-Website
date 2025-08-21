<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    //
    protected $fillable = [
        'menu_id', 'parent_id', 'title', 'url', 'target', 'order', 'is_active'
    ];


    public function menu() 
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent()
    {
        return $this->belongsTo(MenuITem::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuITem::class,'parent_id')->orderBy('order');
    }

}
