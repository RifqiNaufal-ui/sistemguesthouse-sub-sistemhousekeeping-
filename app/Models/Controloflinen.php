<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Controloflinen extends Model
{
    protected $table = 'controloflinen';

    public function rooms(){
    	return $this->belongsTo('App\Room','rooms','id');
    }

    protected $fillable=['id', 'room_id', 'articles', 'dirty', 'clean', 'description'];
}
