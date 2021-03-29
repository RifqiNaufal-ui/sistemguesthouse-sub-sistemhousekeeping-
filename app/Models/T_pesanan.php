<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class T_pesanan extends Model
{
    protected $table = 't_pesanan';
    public $incrementing = false;

    public function customers(){
    	return $this->belongsTo('App\Models\Customer','customer','id');
    }

    public function pakets(){
    	return $this->belongsTo('App\Models\Paket','paket','id');
    }

    public function status_pesanans(){
    	return $this->belongsTo('App\Models\Status_pesanan','status_pesanan','id');
    }

    public function status_pembayarans(){
    	return $this->belongsTo('App\Models\Status_pembayaran','status_pembayaran','id');
    }
}
