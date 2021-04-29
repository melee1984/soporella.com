<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App;

class isAdmin
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
       if (Auth::check()) {

           if(auth()->user()->isAdmin()) {

                 if (session()->has('locale')) {
                    App::setLocale(session()->get('locale'));
                }
                else {
                    App::setLocale(App::getLocale());  // set english by default 
                    session()->put('locale', App::getLocale());
                }

                return $next($request);
            }
        }
        return redirect('/');
    }
}
