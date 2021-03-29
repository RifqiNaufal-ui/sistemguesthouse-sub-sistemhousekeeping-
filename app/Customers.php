<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $guarded = [];

    protected $fillable=['email','name','phone','address'];

    public function transactions()
    {
    	return belongsTo(Transactions::class, 'id');
    }
}
