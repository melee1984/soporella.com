<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Coupon;

class CouponController extends Controller
{
    public function index() 
    {	
     	$coupon = Coupon::orderby('created_at', 'asc')->get();

    	$data['coupon'] = $coupon;
  		return view('management.pages.coupon', compact('coupon'));
      
	}
}
