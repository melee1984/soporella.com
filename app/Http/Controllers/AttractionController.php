<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttractionController extends Controller
{
     public function index(Attraction $attractions) 
    {   
        dd($attractions);

        return view('front.pages.listing');
    }
}
