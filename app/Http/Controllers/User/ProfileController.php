<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Cache;

class ProfileController extends Controller
{
    public function profile() 
	{
     	$menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });

        return view('front.pages.user.profile', compact('menus'));


    }
    
    /**
     * Tickets
     * @return [type] [description]
     */
    public function tickets() 
	{
        $menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });

        return view('front.pages.user.tickets', compact('menus'));


    }
}



