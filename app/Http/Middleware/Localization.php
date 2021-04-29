<?php

namespace App\Http\Middleware;

use Closure;
use App;
use App\Country;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }
        else {
            $locale = App::getLocale();

            App::setLocale($locale);  // set english by default 

            session()->put('locale', $locale);
            $country = Country::whereCountryCode($locale)->first();
            session()->put('conversion', $country->conversion); 
            session()->put('currency', $country->currency); 
        }

        return $next($request);
    }
    
}
