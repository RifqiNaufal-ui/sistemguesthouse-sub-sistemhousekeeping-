<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Minibardaily extends Model
{
    protected $table = 'minibardaily';
    public $incrementing = false;

    public function menus(){
    	return $this->belongsTo('App\Models\Menu','menu','id');
    }

}
