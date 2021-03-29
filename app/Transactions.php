<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $guarded = [];

	protected $fillable = [
        'customer_id', 'total', 'getmoney', 'backmoney', 'date'
    ];

    public function customer()
    {
    	return $this->belongsTo(Customers::class);
    }

    public function transaction_details()
    {
    	return $this->hasMany(TransactionDetails::class);
    }
}
