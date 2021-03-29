<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Controls extends Model
{
    protected $fillable=['guest_name','room_id','checked_by','date'];

    protected $guarded = [];

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }

    public function control_details()
    {
    	return $this->hasMany(ControlDetails::class);
    }
}
