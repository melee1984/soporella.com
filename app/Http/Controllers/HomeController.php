<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App\TopAttraction;

use Cache;
use URL;
use App\Category;
use App\Campaign;
use App\SuggestedAttraction;

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
            $promotions = Promotion::take(4)->get();
            foreach($promotions as $promotion) {
                $promotion->attraction->populateAttractionPageURL();
                $promotion->attraction->populateAttractionImage();

                $promotion->attraction->language_string = $promotion->attraction->convertLanguageField();
            }
            return $promotions;
        });

         $topAttractions = Cache::remember('topAttractions', 30, function () {
            $topAttractions = TopAttraction::take(4)->get();

            foreach($topAttractions as $attractions) {
                $attractions->attraction->populateAttractionPageURL();
                $attractions->attraction->populateAttractionImage();

                $attractions->attraction->language_string = $attractions->attraction->convertLanguageField();
            }
            return $topAttractions;
        });

        $suggestionAttractions = Cache::remember('suggestion', 30, function () {
            $suggestionAttractions = SuggestedAttraction::take(6)->get();
            foreach($suggestionAttractions as $attractions) {
                $attractions->attraction->populateAttractionPageURL();
                $attractions->attraction->populateAttractionImage();

                $attractions->attraction->language_string = $attractions->attraction->convertLanguageField();
            }
            return $suggestionAttractions;
        });

        $menus = Category::forMenu()->active()->get();

        foreach ($menus as $category) {
            $category->language_string = $category->convertLanguageField();
        }

        $campaigns = Cache::remember('campaigns', 30, function () {
            $campaigns = Campaign::where('slider','=',1)
                                ->whereActive(1)
                                ->inRandomOrder()
                                ->take(1)
                                ->get();
             foreach($campaigns as $attraction) {

                $attraction->img_1 = $attraction->populateCampaignImage(0,1);
                $attraction->attraction->language_string = $attraction->attraction->convertLanguageField();
                
                $attraction->attraction->populateAttractionImage();
            }
            return $campaigns;
        });

        return view('front.pages.home', compact('menus', 'campaigns', 'promotions', 'topAttractions', 'suggestionAttractions'));

    }
   
}
