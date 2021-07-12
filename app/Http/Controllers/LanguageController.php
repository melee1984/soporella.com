<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use App\Country;
use Cache;
use URL;

class LanguageController extends Controller
{
    public function url(Request $request, $locale) {

    	session()->put('locale', $locale);

    	// echo $locale;

		Artisan::call('cache:clear');
		
		$country = Country::whereCountryCode($locale)->first();
		
		$countryList = Cache::remember('language', 60, function () {
            return Country::whereActive(1)->get();
        });

		session()->put('conversion', $country->conversion);	
		session()->put('currency', $country->currency);	

		$redirectURLArry = explode("/", $request->input('r'));

		// dd($redirectURLArry);
		$redirectURL = "";
		$i = 0;
		$isContain = false;

		foreach($countryList as $list) {
			$redirectURL = str_replace($list->country_code."/", "{new}", $redirectURL);

			if ($list->country_code == $redirectURLArry[0]) {
				$isContain = true;
			}
		}
		
		if ($isContain) {
			foreach($redirectURLArry as $url) {
				if ($i==0) {
					$redirectURL .= $locale;	
				}
				else {
					$redirectURL .= "/".$url;		
				}
				$i++;
			}
		}
		else {
			$redirectURL = $request->input('r');
		}

		
		// foreach($countryList as $list) {
		// 	$redirectURL = str_replace($list->country_code."/", "{new}", $redirectURL);
		// }

		// echo $redirectURL;

		// $newURL = str_replace("{new}", $locale, $redirectURL);
		// echo $locale;
		// dd($newURL);
		// die();

		return redirect($redirectURL);
    }
}
