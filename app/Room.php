<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    protected $fillable=['roomType','numberRoom','price','code'];

    public function orderr()
    {
    	return belongsTo(Orderr::class, 'id');
    }
}
