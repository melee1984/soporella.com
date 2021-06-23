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

		Artisan::call('cache:clear');
		
		$country = Country::whereCountryCode($locale)->first();
		
		$countryList = Cache::remember('language', 60, function () {
            return Country::whereActive(1)->get();
        });

		session()->put('conversion', $country->conversion);	
		session()->put('currency', $country->currency);	

		$redirectURL = $request->input('r');

		foreach($countryList as $list) {
			$redirectURL = str_replace($list->country_code, "{new}", $redirectURL);
		}

		$newURL = str_replace("{new}", $locale, $redirectURL);
		// echo $locale;
		// dd($newURL);
		// die();

		return redirect($newURL);
    }
}
