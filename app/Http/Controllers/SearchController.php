<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cache;
use App\Category;
use App\Attraction;

class SearchController extends Controller
{
    public function index(Request $request) {

    	// echo $request->input('emirate');
    	// echo $request->input('v');
    	
    	$menus = Cache::remember('menus', 30, function () {
            $categories = Category::forMenu()->active()->get();
            foreach($categories as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $categories;
        });	

    	$results = Attraction::whereActive(2)->get();

    	return view('front.pages.search', compact('menus', 'results'));

    }
}
