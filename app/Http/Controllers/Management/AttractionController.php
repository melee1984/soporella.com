<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use  App\Attraction;

class AttractionController extends Controller
{
  
  /**
     * Management Login 
     * @return view 
     */
    public function index() 
    {	
    	$attractions = Attraction::paginate(50);

		return view('management.pages.attraction', compact('attractions'));
    }

    /**
     * Edit Attractions 
     * @param  Attractions $attraction [description]
     * @return [type]                  [description]
     */
    public function show(Attraction $attraction) 
    {

    	return view('management.pages.attractions.edit', compact('attraction'));
    }
}
