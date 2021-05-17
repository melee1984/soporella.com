<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;
use Auth;
use App\Category;

class CheckoutController extends Controller
{	
	/**
	 * Checkout 
	 * @return [type] [description]
	 */
   	public function checkout() 
    {   
		$menus = Cache::remember('menus', 30, function () {
           $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });
			
		return view('front.pages.checkout.checkout', compact('menus'));
    }

    

    /**
     * [success description]
     * @return [type] [description]
     */
    public function success() {

    	$menus = Cache::remember('menus', 30, function () {
           $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });
			
		return view('front.pages.checkout.success', compact('menus'));

    }


}
