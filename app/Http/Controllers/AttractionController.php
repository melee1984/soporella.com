<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Attraction;
use Cache;

use App\Models\Attraction\AttractionRateHeader;

class AttractionController extends Controller
{
	public function show($category, Attraction $attraction) 
    {      
		$menus = Cache::remember('menus', 30, function () {
            $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });
	   
        $rates = $attraction->rates;

        foreach($rates as $rate) {
            $rate->language_string = $rate->convertLanguageField();
            foreach($rate->details as $detail) {
                $detail->language_string = $detail->convertLanguageField();
                $detail->price = $detail->computePricedOnTheCountrySelected();

                $detail->markdown_price = $detail->computeMarkdownPricedOnTheCountrySelected();
                $detail->currency = $detail->getCurrency();
            }

        }

        foreach($attraction->images as $image) {
            $image->img = $image->populateAttractionGalleryImage();
        }

        foreach($attraction->interestedIn as $interested) {
            $interested->attraction->slug = $interested->populateAttractionPageURL();
            $interested->attraction->populateAttractionImage();
        }

        $attraction->populateAttractionImage();
        $attraction->language_string = $attraction->convertLanguageField();

        return view('front.pages.inside', compact('menus', 'attraction'));
    }
    /**
     * [inside description]
     * @param  Category $category [description]
     * @return [type]             [description]
     */
    public function inside(Attraction $attraction) 
    {   
        $menus = Cache::remember('menus', 30, function () {
            $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });


        $attraction->language_string = $attraction->convertLanguageField(); 
        $rates = $attraction->rates;

        foreach($rates as $rate) {
            $rate->language_string = $rate->convertLanguageField();
            foreach($rate->details as $detail) {
                $detail->language_string = $detail->convertLanguageField();
                $detail->price = $detail->computePricedOnTheCountrySelected();;
                $detail->markdown_price = $detail->computeMarkdownPricedOnTheCountrySelected();
                $detail->currency = $detail->getCurrency();
            }
        }

        $attraction->populateAttractionImage();

        foreach($attraction->interestedIn as $interested) {
            $interested->attraction->slug = $interested->populateAttractionPageURL();
            $interested->attraction->populateAttractionImage();
        }

        foreach($attraction->images as $image) {
            $image->img = $image->populateAttractionGalleryImage();
        }

        
        return view('front.pages.inside', compact('attraction', 'menus'));

    }

    
}
