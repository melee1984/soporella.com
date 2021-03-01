<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use  App\Attractions;

class AttractionController extends Controller
{
  
  /**
     * Management Login 
     * @return view 
     */
    public function index() 
    {	
    	$attractions = Attractions::paginate(50);

		return view('management.pages.attraction', compact('attractions'));
    }

    /**
     * Edit Attractions 
     * @param  Attractions $attraction [description]
     * @return [type]                  [description]
     */
    public function show(Attractions $attraction) 
    {

    	return view('management.pages.attractions.edit', compact('attraction'));
    }
}
