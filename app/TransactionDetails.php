<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transactions_id', 'package_id', 'quantity', 'unitprice', 'discount', 'amount'
    ];

    public function transactions()
    {
    	return $this->belongsTo(Transactions::class);
    }

     public function package(){
    	return $this->belongsTo(Packages::class);
    }
}
