<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    
	protected $fillable = ['coupon', 'percent', 'active', 'discount_amount'];
    public $timestamps = true;
}
