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
    public function index($locale) 
    {       

            if ($locale=='') {
                echo "Locale is not found. Please try to refresh your page."; 
                die();
            }

            $menus = Cache::remember('menus', 30, function () {
                $categories = Category::forMenu()->active()->get();
                foreach($categories as $category) {
                    $category->language_string = $category->convertLanguageField();
                }
                return $categories;
            });

         // $campaigns = Cache::remember('campaigns', 0, function () {
            
            $campaigns = Campaign::with('attraction')
                            ->whereActive(1)
                            ->whereSlider(0)
                            ->whereCountryCode($locale)
                            ->get();

                foreach($campaigns as $campaign) {


                    if ($campaign->attraction) {

                        $campaign->large_img = $campaign->populateCampaignImage(1,1);
                        $campaign->img_1 = $campaign->populateCampaignImage(0,1);

                        $campaign->language_string = $campaign->attraction->convertLanguageField();
                     
                        if ($campaign->attraction->photo!="") {
                            $campaign->attraction->img = $campaign->populateAttractionImage();    
                        }
                        
                        // Gallery Image 
                        foreach($campaign->attraction->images as $image) {
                            $image->photo = $image->populateAttractionGalleryImage(); // Attraction Gallary 
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

                }
            
        //     return $campaigns;
            
        // });

    	return view('front.pages.promotions.view', compact('menus', 'campaigns'));

    }
}
