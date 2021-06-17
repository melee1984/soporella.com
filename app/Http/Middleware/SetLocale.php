<?php

namespace App\Http\Middleware;

use Closure;

use Cache;
use URL;
use App;
use App\Country;
use Session;

class SetLocale
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
        $locale = $request->segment(1);

        if ($locale != session()->get('locale')) {

            app()->setLocale($locale);
            session()->put('locale', $locale);
            // Artisan::call('cache:clear');
            $country = Country::whereCountryCode($locale)->first();
            session()->put('conversion', $country->conversion); 
            session()->put('currency', $country->currency); 

        }

        return $next($request);
    }
}
