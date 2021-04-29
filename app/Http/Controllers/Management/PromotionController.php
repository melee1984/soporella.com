<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Promotion;

class PromotionController extends Controller
{
    /**
     * Promotions 
     * @return view 
     */
    public function index() 
    {		
    	$promotions = Promotion::paginate(20);

		return view('management.pages.promotions', compact('promotions'));
		
    }
}
