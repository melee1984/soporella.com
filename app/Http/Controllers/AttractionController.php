<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Attraction;
use Cache;

use App\Models\Attraction\AttractionRateHeader;

class AttractionController extends Controller
{
	public function show($category, Attraction $attraction) 
    {   
		$menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });
	   
        $attraction->rates;

        foreach($attraction->interestedIn as $interested) {
            $interested->attraction->slug = $interested->populateAttractionPageURL();
            $interested->attraction->photo = $interested->populateAttractionImage();
        }

        return view('front.pages.inside', compact('menus', 'attraction'));
    }
    /**
     * [inside description]
     * @param  Category $category [description]
     * @return [type]             [description]
     */
    public function inside(Attraction $attraction) 
    {   
        $menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });

        $attraction->rates;

        foreach($attraction->interestedIn as $interested) {
            $interested->attraction->slug = $interested->populateAttractionPageURL();
            $interested->attraction->photo = $interested->populateAttractionImage();
        }
        
        
        return view('front.pages.inside', compact('attraction', 'menus'));

    }

    
}
