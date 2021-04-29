<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopAttractionController extends Controller
{
    /**
     * Promotions 
     * @return view 
     */
    public function index() 
    {		
    	return view('management.pages.topattraction');
	}
}
