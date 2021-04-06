<?php

namespace App\Http\Controllers\Api\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shopping\Cart;
use App\Models\Shopping\CartDetails;

use App\Models\Attraction\AttractionRateDetails;

use App\Attraction;
use Session;
use Auth;
use URL;

class BasketController extends Controller
{
    public function addCart(Request $request, Attraction $attraction) 
    {   
		$data = array();
        $data['status'] = 0;
        $data['message'] = __('Unable to process your request. Please try again.');
        $withAddValue = false;
        $currency = "AED";

        foreach($request->input('qty') as $list) {

        	if ($list['qty'] >=1) {
        		$withAddValue = true;
        	}
        }

        if (!$withAddValue) {
        	$data['message'] = __('Sorry, unable to process your request. You have added a item without quantity.');
        }
        else {

        	if ($attraction) {
	            // 
	            $cart = Cart::whereSessionId(Session::getID())->first();

	             if (!$cart) {

	                if (Auth::check()) {

	                    $cart = new Cart;
	                    $cart->session_id = Session::getId();
	                    $cart->user_id = Auth::User()->id;
	                    $cart->ip_address  = $_SERVER['REMOTE_ADDR'];
	                    $cart->active = 0;
	                    $cart->save();

	                }
	                else {

	                    $cart = Cart::updateOrCreate(
	                        ['session_id' => Session::getId(), 'ip_address' => $_SERVER['REMOTE_ADDR'], 'active' => 0],
	                        ['session_id' => Session::getId(), 'ip_address' => $_SERVER['REMOTE_ADDR'], 'active' => 0,]
	                    );

	                    if ($cart) {
	                    	
	                    	// Adding item into the Cart Details table 
							// Haveing the same functionality this should be refactor

	                    	$sub_total = 0;
	                    	$data_variance = array();
	                    	$qty = 0;

	                    	foreach($request->input('qty') as $list) {

	                    		if ($list['qty']!=0) {

	                    			$attractionRateDetails = AttractionRateDetails::find($list['id']);
									array_push($data_variance, array('rate_detail_id' => $attractionRateDetails->id,
	                                                    'title' => $attractionRateDetails->title,
	                                                    'price' => $attractionRateDetails->getPrice(),
	                                                    'qty' => $list['qty'],
	                                                    'currency' => $currency
	                                                ));  
									$sub_total = $sub_total + $attractionRateDetails->price * $list['qty'];    
									$qty = $qty + $list['qty'];

	                    		}
								

							}

							$cartItem = CartDetails::updateOrCreate(['cart_id'=>$cart->id, 
																	'attraction_id' => $attraction->id, 'attraction_detail_id' => $attractionRateDetails->id],	
											[ 
											'cart_id'=>$cart->id, 
		                                    'attraction_id' => $attraction->id, 
		                                    'attraction_detail_id' => $attractionRateDetails->id,
											'variance_details' => serialize($data_variance),
		                                    'variance_total' =>  $sub_total,
		                                    'selected_date' => $request->input('date'),  
		                                    'total_qty' => $qty
		                                ]);
						}

							$data['status'] = 1;
							$data['message'] = __('Successfully Updated cart');

					}

				}
				else {


					// Adding item into the Cart Details table  
					// Haveing the same functionality this should be refactor
					$sub_total = 0;
	            	$data_variance = array();
	            	$qty = 0;

	            	foreach($request->input('qty') as $list) {

	            		if ($list['qty']!=0) {

							$attractionRateDetails = AttractionRateDetails::find($list['id']);

							array_push($data_variance, array('rate_detail_id' => $attractionRateDetails->id,
		                                        'title' => $attractionRateDetails->title,
		                                        'price' => $attractionRateDetails->getPrice(),
		                                        'qty' => $list['qty'],
		                                        'currency' => $currency,

		                                    ));  

							$sub_total = $sub_total + $attractionRateDetails->price * $list['qty'];    
							$qty = $qty + $list['qty'];

						}

					}

					$cartItem = CartDetails::updateOrCreate(['cart_id'=>$cart->id, 
															'attraction_id' => $attraction->id, 'attraction_detail_id' => $attractionRateDetails->id],	
									[ 
									'cart_id'=>$cart->id, 
	                                'attraction_id' => $attraction->id, 
	                                'attraction_detail_id' => $attractionRateDetails->id,
									'variance_details' => serialize($data_variance),
									'variance_total' =>  $sub_total,
	                                'selected_date' => $request->input('date'),  
	                                'total_qty' => $qty,
	                            ]);

					$data['status'] = 1;
					$data['message'] = __('Successfully added item to your cart');
				}
			}
        }
		
		return response()->json($data, 200);

    }

    public function updateCart($category, Attraction $attraction) 
    {   
		die('TEST');
    }

    /**
     * Display the cart information / Basket 
     * @return [type] [description]
     */
    public function index() {

    	$data = array();
    	$cart = Cart::with('details')->whereSessionId(Session::getID())->first();

    	$data['status'] = 1;

    	if ($cart) {

    		$currency = $cart->currency;
    		$data['summary'] =  $cart->summary();

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
	                                        'currency' => $variance['currency']);

					array_push($variance_updated, $copied_array);
				}

				$detail->variance_converted = $variance_updated;
			}

			$data['cart'] = $cart;

		}
		else {
			$data['cart'] = array();
			$data['status'] =0;
		}


    	return response()->json($data, 200);
    }

    public function summary() {

    	$data = array();

    	$cart = Cart::with('details')->whereSessionId(Session::getID())->first();

    	if ($cart) $data['summary'] = $cart->summary();
		

    	return response()->json($data, 200);
    }

    public function delete(Request $request) {
    	
    	die();	
    }

}
