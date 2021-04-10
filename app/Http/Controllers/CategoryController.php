<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

use Cache;

class CategoryController extends Controller
{
     /**
     * Category Display 
     * @param  Category $category [description]
     * @return [type]             [description]
     */
    public function index(Category $category) 
    {   
        $menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });

        foreach($category->attractionsMapping as $attractions) {
            $attractions->attraction->populateAttractionImage();
            $attractions->attraction->pageUrl = route('page.attraction', [$category->slug, $attractions->attraction]);
        }   
        
        return view('front.pages.listing', compact('menus', 'category'));
    }
}
