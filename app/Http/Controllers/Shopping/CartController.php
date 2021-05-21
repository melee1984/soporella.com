<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;
use App\Category;
use App\Request\AddCartRequest;

class CartController extends Controller
{
    public function index() 
    {   
		$menus = Cache::remember('menus', 30, function () {
            $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });
			
		return view('front.pages.shopping.cart', compact('menus'));
    }


    public function store(AddCartRequest $request) {

    	return back();
    }

}
