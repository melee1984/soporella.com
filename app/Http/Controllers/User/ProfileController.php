<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Cache;

use App\Models\Shopping\Cart;
use App\Models\Shopping\CartDetails;
use URL;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function profile() 
	{
     	$menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });

        return view('front.pages.user.profile', compact('menus'));
    }

    public function reset() 
    {
        $menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });

        return view('front.pages.user.reset', compact('menus'));
    }

    public function updatePassword(Request $request) {

        $validator = $request->validate([
            'newpassword' => 'required|min:4',
            'confirmpassword' => 'required|same:newpassword|min:4',
        ]);

        $request->User()->password =  Hash::make($request->input('newpassword'));
        $request->User()->save();

        return redirect()->route('profile.information');

    }   
    /**
     * Tickets
     * @return [type] [description]
     */
    public function tickets() 
    {
        $currency = "";

        $menus = Cache::remember('menus', 30, function () {
            return Category::forMenu()->active()->get();
        });

        $orders = Cart::whereUserId(Auth::User()->id)
                    ->whereNotNull('submitted_at') 
                    ->orderBy('created_at', 'asc')->get();

       
       foreach($orders as $cart) {


             $currency = $cart->currency;

            foreach($cart->details as $detail) {

                $detail->attractiondetails;
                $detail->attraction;
                $detail->attraction->photo = URL::to("product/image?name=".$detail->attraction->photo."&s=thumb");
                $detail->attraction->url = route('page.attraction.view', $detail->attraction);
                $detail->variance_total = number_format($detail->variance_total, 2)  . " " . $currency;
                // Just to format response 
                $detail->variance_details = unserialize($detail->variance_details);

                $variance_updated = array();

                foreach($detail->variance_details as $variance) {

                    $copied_array = array('rate_detail_id' => $variance['rate_detail_id'],
                                            'title' => $variance['title'],
                                            'price' => number_format($variance['price'], 2) . " " . $variance['currency'],
                                            'qty' => $variance['qty'],
                                            'currency' => $variance['currency'],
                                            'sub_total' => number_format($variance['price'] * $variance['qty'], 2) . " " . $variance['currency'],

                                        );

                    array_push($variance_updated, $copied_array);

                }

                $detail->variance_converted = $variance_updated;
            }


       }


        return view('front.pages.user.tickets', compact('menus', 'orders'));

    }
    
    
}



