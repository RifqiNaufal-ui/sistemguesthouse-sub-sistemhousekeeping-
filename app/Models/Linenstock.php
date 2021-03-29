<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linenstock extends Model
{
    protected $table = 'linenstock';

    public function rooms(){
    	return $this->belongsTo('App\Room','rooms','id');
    }

    protected $fillable=['id', 'room_id', 'items', 'stock', 'new_stock', 'total1', 'less', 'total2', 'discrepancies'];
}
