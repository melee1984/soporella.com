<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\TopAttraction;

use Cache;
use URL;
use App\Category;
use App\Campaign;

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

        $menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });

        $campaigns = Cache::remember('campaigns', 30, function () {
            $campaigns = Campaign::where('slider','=',1)
                                ->inRandomOrder()
                                ->take(1)
                                ->get();
             foreach($campaigns as $attraction) {

                $attraction->attraction->populateAttractionImage();
            }
            return $campaigns;
        });

        return view('front.pages.home', compact('menus', 'campaigns', 'promotions', 'topAttractions', 'suggestionAttractions'));

    }
   
}
