<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;

class AttractionController extends Controller
{
     public function index(Attraction $attraction) 
    {   
        dd($attraction);

        return view('front.pages.listing');
    }
}
