<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];

    public static function name()
    {
        return "Menu";
    }

    public function childs() {
        return $this->hasMany('App\Models\Menu','menu_Id','id') ;
    }

    protected $visible  = ['title','icon','href'];
    protected $fillable   = ['title','icon','href','menu_Id','level','orden'];

}