<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Cache;

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

        return view('front.pages.home', compact('promotions'));

    }

    public function displayByTheme() 
    {
        return view('front.pages.listing');
    }
}
