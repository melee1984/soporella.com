<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Coupons 
     * @return view 
     */
    public function index() 
    {	
		return view('management.pages.coupons');
    }
}
