<?php

namespace App\Models\Shopping;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
	protected $fillable = ['user_id', 'session_id', 'fullname', 'mobile','email', 'order_no', 'ref_no','active', 'ip_address', 'processed_at', 'payment_id'];
	protected $hidden = ['session_id', 'updated_at', 'created_at', 'processed_at', 'sms_code', 'user_id', 'ip_address'];
    public $timestamps = true;

    public function details() {
		return $this->hasMany('App\Models\Shopping\CartDetails','cart_id', 'id');
    }

    public function generateOrderNo() {
        
        $order = Cart::count();
        $length = 10;
        return $orderNo = substr(str_repeat(0, $length)."0971".$order, - $length);
     }

    public function summary() {


    	$data = array();
    	$subTotal = 0;
    	$total = 0;
    	$discount = 0;
    	$vat = 0;
    	$totalQty = 0;

    	foreach($this->details as $item) {
    		$subTotal = $subTotal + $item->variance_total;
    		$totalQty = $totalQty + $item->total_qty;
    	}

    	$total = $subTotal - $discount;
    	$currency = $this->currency;

    	$summary = array(
    		'subTotal' => number_format($subTotal, 2) . " " . $currency,
    		'discount' => number_format($discount,2). " " . $currency,
    		'vat' => number_format($vat,2). " " . $currency,
    		'total' => number_format($total, 2). " " . $currency,
    		'totalQty' => $totalQty,
    	);

    	return $summary;
    }

}
