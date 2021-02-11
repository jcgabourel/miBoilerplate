<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title','menu_Id'];

    public function childs() {
        return $this->hasMany('App\Models\Menu','menu_Id','id') ;
    }
}
