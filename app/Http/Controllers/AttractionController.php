<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attraction;
use App\Category;

class AttractionController extends Controller
{
	public function index(Category $category, Attraction $attraction) 
    {   
       return view('front.pages.listing');
    }
}
