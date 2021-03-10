<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionsController extends Controller
{
   /**
     * About us 
     * @return return view
     */
    public function index() 
    {
    	return view('front.pages.promotions.view');
    }
}
