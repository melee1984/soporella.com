<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cache;
use App\Category;

class PageController extends Controller
{
    /**
     * About us 
     * @return return view
     */
    public function aboutus() 
    {   
        $menus = Cache::remember('menus', 30, function () {
             $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

    	return view('front.pages.aboutus', compact('menus'));
    }
    /**
     * About us 
     * @return return view
     */
    public function sellticketwithus() 
    {
    	 $menus = Cache::remember('menus', 30, function () {
             $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

        return view('front.pages.sellticketwithus', compact('menus'));
    }
    /**
     * About us 
     * @return return view
     */
    public function disclaimer() 
    {
    	 $menus = Cache::remember('menus', 30, function () {
             $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

        return view('front.pages.disclaimer', compact('menus'));
    }
    /**
     * terms and conditions 
     * @return return view
     */
    public function termsandconditions() 
    {
         $menus = Cache::remember('menus', 30, function () {
             $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

        return view('front.pages.termsandconditions', compact('menus'));
    }
    /**
     * privacy policy
     * @return return view
     */
    public function primvacypolicy() 
    {
    	 $menus = Cache::remember('menus', 30, function () {
             $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

        return view('front.pages.primvacypolicy', compact('menus'));
    }
    /**
     * shipping and return policy 
     * @return return view
     */
    public function shippingandreturnpolicy() 
    {
    	 $menus = Cache::remember('menus', 30, function () {
             $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

        return view('front.pages.shippingandreturnpolicy', compact('menus'));
    }
    /**
     * contactus 
     * @return return view
     */
    public function contactus() 
    {
    	 $menus = Cache::remember('menus', 30, function () {
             $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

        return view('front.pages.contactus', compact('menus'));
    }
    /**
     * Sitemap 
     * @return return view
     */
    public function sitemap() 
    {
    	 $menus = Cache::remember('menus', 30, function () {
             $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

        return view('front.pages.sitemap', compact('menus'));
    }
       
}
