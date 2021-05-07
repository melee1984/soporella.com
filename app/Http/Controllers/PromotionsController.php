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

         $campaigns = Cache::remember('campaigns', 0, function () {
            
            $campaigns = Campaign::with('attraction')
                            ->whereActive(1)
                            ->whereSlider(0)
                            ->get();

            foreach($campaigns as $campaign) {

                $campaign->large_img = $campaign->populateCampaignImage(1,1);
                $campaign->language_string = $campaign->attraction->convertLanguageField();
             
                if ($campaign->attraction->photo!="") {
                    $campaign->attraction->img = $campaign->populateAttractionImage();    
                }
                
                // Gallery Image 
                foreach($campaign->attraction->images as $image) {
                    $image->photo = $image->populateAttractionGalleryImage();
                }

                $campaign->populateAttractionPageURL();

                foreach($campaign->attraction->rates as $rate) {

                    $rate->language = $rate->convertLanguageField();

                    foreach($rate->details as $detail) {
                        $detail->language = $detail->convertLanguageField();

                        $detail->price = $detail->computePricedOnTheCountrySelected() . " " . $detail->getCurrency();
                        $detail->markdown_price = $detail->computeMarkdownPricedOnTheCountrySelected() . " " . $detail->getCurrency();

                    }

                } 

            }
        
            return $campaigns;
            
        });

    	return view('front.pages.promotions.view', compact('menus', 'campaigns'));

    }
}
