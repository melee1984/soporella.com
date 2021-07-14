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
        	$data['message'] = __('Sorry, unable to process your request. You have added an item without quantity.');
        }
        else {
        		
        	try {
        		
        		if ($attraction) {
		            // 
		            $cart = Cart::whereSessionId(Session::getID())->first();

		             if (!$cart) {

		                // if (Auth::check()) {

		                //     $cart = new Cart;
		                //     $cart->session_id = Session::getId();
		                //     $cart->user_id = Auth::User()->id;
		                //     $cart->ip_address  = $_SERVER['REMOTE_ADDR'];
		                //     $cart->active = 0;
		                //     $cart->save();

		                // }
		                // else {

		                    $cart = Cart::updateOrCreate(
		                        ['session_id' => Session::getId(), 'ip_address' => $_SERVER['REMOTE_ADDR'], 'active' => 0],
		                        ['session_id' => Session::getId(), 'ip_address' => $_SERVER['REMOTE_ADDR'], 'active' => 0,]
		                    );

		                    if ($cart) {
		                    	

		                    	if (Auth::check()) {
				                    $cart->user_id = Auth::User()->id;
				                    $cart->active = 0;
				                    $cart->save();
				                }

		                    	// Adding item into the Cart Details table 
								// Haveing the same functionality this should be refactor

		                    	$sub_total = 0;
		                    	$data_variance = array();
		                    	$qty = 0;

		                    	foreach($request->input('qty') as $list) {

		                    		if ($list['qty']!=0) {

		                    			$attractionRateDetails = AttractionRateDetails::find($list['id']);

		                    			if ($attractionRateDetails) {

		                    				$attractionRateDetails->language_string = $attractionRateDetails->convertLanguageField();	
		                    				
		                    			}
		                    			
										array_push($data_variance, array('rate_detail_id' => $attractionRateDetails->id,
		                                                    'title' => $attractionRateDetails->language_string['title'],
		                                                    'price' => $attractionRateDetails->getPrice(),
		                                                    'qty' => $list['qty'],
		                                                    'currency' => $currency
		                                                ));  
										$sub_total = $sub_total + $attractionRateDetails->getPrice() * $list['qty'];    
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

						// }


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

								$attractionRateDetails->language_string = $attractionRateDetails->convertLanguageField();


								array_push($data_variance, array('rate_detail_id' => $attractionRateDetails->id,
			                                        'title' => $attractionRateDetails->language_string['title'],
			                                        'price' => $attractionRateDetails->getPrice(),
			                                        'qty' => $list['qty'],
			                                        'currency' => $currency,

			                                    ));  

								$sub_total = $sub_total + $attractionRateDetails->getPrice() * $list['qty'];    
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
				else {

					$data['status'] = 0;
					$data['message'] = __('Unable to find Attraction please try again.');

				}

        	} catch (Exception $e) {
        		\Log::error('Error on basketController Add to Cart' . $e);
        	}


        }  // end of the withAddValue 
		
		return response()->json($data, 200);

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
	            $detail->attraction->populateAttractionImage();

			    $detail->attraction->url = route('page.attraction.view', [app()->getLocale(), $detail->attraction->slug]);
				$detail->variance_total = number_format($detail->variance_total, 2)  . " " . $currency;
			    // Just to format response 
				$detail->variance_details = unserialize($detail->variance_details);

				$variance_updated = array();

				foreach($detail->variance_details as $variance) {

					$copied_array = array('rate_detail_id' => $variance['rate_detail_id'],
	                                        'title' => $variance['title'],
	                                        'price' => number_format((float)$variance['price'], 2) . " " . $variance['currency'],
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

    public function deleteDetail(CartDetails $cartDetail) {
    		
    	$data = array();
    	$data['status'] = 0;
		$data['message'] = "Sucessfully delete item detail";


    	if ($cartDetail) {
    		$status = $cartDetail->delete();

    		if ($status) {
 				$data['status'] = 1;
 				$data['message'] = "Sucessfully delete item detail";
    		}
    	}

    	return response()->json($data, 200);
    }

    public function updateDetail(Request $request, CartDetails $cartDetail) {

    	$variance_formated = unserialize($cartDetail->variance_details);

    	$new_format_variance = array();
    	$sub_total = 0;
    	$qty = 0;
    	$data['status'] = 0;

    	foreach($variance_formated as $variance) {

    		if ($request->input('rate_detail_id') == $variance['rate_detail_id']) {

    			if ($request->input('qty')!=0) {
    				$new_format = array('rate_detail_id' => $variance['rate_detail_id'],
	                                        'title' => $variance['title'],
	                                        'price' => $variance['price'],
	                                        'qty' => $request->input('qty'),
	                                        'currency' => $variance['currency']);
    			}

				$sub_total = $sub_total + $variance['price'] * $request->input('qty');    
				$qty = $qty + $request->input('qty');

    		}
    		else {

    			$new_format = array('rate_detail_id' => $variance['rate_detail_id'],
	                                        'title' => $variance['title'],
	                                        'price' => $variance['price'],
	                                        'qty' => $variance['qty'],
	                                        'currency' => $variance['currency']);

    			$sub_total = $sub_total + $variance['price'] * $variance['qty'];  
				$qty = $qty + $variance['qty'];
  
    		}

			array_push($new_format_variance, $new_format);

    	}

		$cartDetail->variance_details = serialize($new_format_variance);
		$cartDetail->variance_total = $sub_total;
		$cartDetail->total_qty = $qty;
		// Update Cart Details 
    	$status = $cartDetail->save();

    	$cart = Cart::with('details')->whereSessionId(Session::getID())->first();

    	if ($status) {
    		$data['summary'] = $cart->summary();
    		$data['status'] = 1;
    	}

		return response()->json($data, 200);
    }

}
