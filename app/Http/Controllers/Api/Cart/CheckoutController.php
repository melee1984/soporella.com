<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\PaymentMethod;
use App\Models\Shopping\Cart;

use Session;
use URL;
use Auth;
use Carbon\Carbon;
use Mail;
	
// Email notification here 
// 
use App\Mail\OrderSuccessEmail;


class CheckoutController extends Controller
{
    public function checkout(Request $request) 
    {   	
    	$data = array();
    	

    	$data['status'] = 1;
    	$data['paymentGatewayList'] = PaymentMethod::whereActive(1)->get();
    	$data['user'] = $request->user();

    	$cart = Cart::whereSessionId(Session::getID())->first();
    	
    	if ($cart) {

    		$currency = $cart->currency;

    		foreach($cart->details as $detail) {

	    		$detail->attractiondetails;
	    		$detail->attraction;

	            $detail->attraction->populateAttractionImage();

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

    	$data['cart'] = $cart;;

		return response()->json($data, 200);	
    }


    /**
     * [proceed description]
     * @return [type] [description]
     */
    public function proceed(Request $request) {

    	$data = array();
    	$data['status'] = 0;
    	$pageURL = route('checkout.success');
    	$data['message'] = __('Unable to process your request. Please try to refresh your page and try again.');

		$cart = Cart::whereSessionId(Session::getID())->first();

		if ($cart) {

			$cart->fullname = Auth::User()->name;
			$cart->email = Auth::User()->email;
			$cart->mobile = Auth::User()->mobile;
			$cart->ref_no = $cart->generateOrderNo();
			$cart->currency = trans('messages.CURRENCY_SYMBOL'); // This will save the current currency symbol 
			$cart->active = 1;
			$cart->status_id = 1;
			$cart->submitted_at = now();
			$cart->email_sent = 1;
			
			$status = $cart->save();

			if ($status) {

				// Send Email Notification Here 
				$when = Carbon::now()->addMinutes(5);

				try {
					
					// $sentEmail = Mail::to($cart->email)
					// 		->later($when, new OrderSuccessEmail($cart));

				} catch (Exception $e) {
					\Log::error('Error when sending email to Order Success CheckoutController Line 116');
				}
				finally {
				 	$cart->email_sent = 0;
				 	$cart->save();
				}

				$data['status'] = 1;
				// $data['emailNotification'] = $sendEmail;

				$data['redirectURL'] = route('checkout.success');

				// regenerate session 
				$request->session()->regenerate();
 			}
		}
		
		return response()->json($data, 200);	
    }


    public function updatepayment(Request $request) {

    	$data = array();
    	$data['status'] = 0;
    	$data['message'] = __('Unable to process your request. Please try to refresh your page and try again.');

		$cart = Cart::whereSessionId(Session::getID())->first();

		if ($cart) {

			$cart->payment_id = $request->input('payment_id');
			$status = $cart->save();

			if ($status) {
				$data['status'] = 1;
				$data['message'] = __('Successfully updated payment option');
 			}

		}

		return response()->json($data, 200);	

    }

    
}
	