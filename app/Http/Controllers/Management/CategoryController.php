<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Categories;

class CategoryController extends Controller
{
    /**
     * Management Login 
     * @return view 
     */
    public function index() 
    {	
    	$categories = Categories::orderby('sorting', 'desc')->get();

		return view('management.pages.category', compact('categories'));
	}

}
