<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlDetails extends Model
{
    protected $fillable=['controls_id','articles','dirty','clean','description'];

    protected $table = 'control_details';

    public function controls()
    {
    	return $this->belongsTo(Controls::class);
    }
}
