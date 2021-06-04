<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cache;
use App\Category;
use App\Attraction;

class SearchController extends Controller
{
    public function index(Request $request) {

    	
    	$menus = Cache::remember('menus', 30, function () {
            $categories = Category::forMenu()->active()->get();
            foreach($categories as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $categories;
        });	

    	$results = Attraction::whereActive(1)
                    ->whereLocationId($request->input('emirate'))
                    ->where('slug','like','%'.$request->input('v').'%')
                    ->get();

        foreach($results as $attraction) {
            $attraction->populateOriginalImage();
            $attraction->language_string = $attraction->convertLanguageField();                
        }

    	return view('front.pages.search', compact('menus', 'results'));

    }
}
