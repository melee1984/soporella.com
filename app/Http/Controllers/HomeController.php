<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\TopAttraction;

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
            $promotions = Promotion::take(8)->get();
            foreach($promotions as $promotion) {
                $promotion->populateAttractionPageURL();
                $promotion->populateAttractionImage();
            }
            return $promotions;
        });

         $topAttractions = Cache::remember('promotions', 30, function () {
            $topAttractions = TopAttraction::take(8)->get();
            foreach($topAttractions as $attractions) {
                $attractions->populateAttractionPageURL();
                $attractions->populateAttractionImage();
            }
            return $topAttractions;
        });

        $suggestionAttractions = Cache::remember('promotions', 30, function () {
            $suggestionAttractions = TopAttraction::take(8)->get();
            foreach($suggestionAttractions as $attractions) {
                $attractions->populateAttractionPageURL();
                $attractions->populateAttractionImage();
            }
            return $suggestionAttractions;
        });


        return view('front.pages.home', compact('promotions', 'topAttractions', 'suggestionAttractions'));

    }
    
    public function displayByTheme() 
    {
        return view('front.pages.listing');
    }
}
