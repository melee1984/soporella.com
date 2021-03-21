<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cache;
use App\Category;
use App\Campaign;

class PromotionsController extends Controller
{
   /**
     * About us 
     * @return return view
     */
    public function index() 
    {
    	$menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });

        $campaigns = Cache::remember('campaigns', 30, function () {
            return Campaign::whereActive(1)->get();
        });
		


    	return view('front.pages.promotions.view', compact('menus', 'campaigns'));

    }
}
