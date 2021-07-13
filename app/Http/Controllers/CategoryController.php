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
    public function index($locale, Category $category) 
    {      
        $menus = Cache::remember('menus', 30, function () {
            $categories = Category::forMenu()->active()->get();

            foreach($categories as $category) {
                $category->language_string = $category->convertLanguageField();
            }

            return $categories;
        });

        foreach($category->attractionsMapping as $attractions) {

            if ($attractions->attraction) {
                $attractions->attraction->populateAttractionImage();
                $attractions->attraction->pageUrl = route('page.attraction', [app()->getLocale(), $category->slug, $attractions->attraction->slug]);    
            }
            
        }   
        
        return view('front.pages.listing', compact('menus', 'category'));
    }
}
