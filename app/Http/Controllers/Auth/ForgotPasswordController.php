<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Cache;
use App\Category;
use Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {   
        $menus = Cache::remember('menus', 30, function () {
           $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });
            
        return view('auth.passwords.email', compact('menus'));

    }

}
