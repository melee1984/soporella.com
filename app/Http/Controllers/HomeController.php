<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Cache;
use URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {   
        $promotions = Cache::remember('promotions', 30, function () {
            return Promotion::take(10)->get();
        });

        foreach($promotions as $promotion) {
            $promotion->attraction->pageUrl = URL::to('promotion/'.$promotion->attraction->slug);
        }

        return view('front.pages.home', compact('promotions'));

    }

    public function displayByTheme() 
    {
        return view('front.pages.listing');
    }
}
