<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    /**
     * Management Login 
     * @return view 
     */
    public function index() 
    {	
    	$categories = Category::orderby('sorting', 'desc')->get();

		return view('management.pages.category', compact('categories'));
	}

}
