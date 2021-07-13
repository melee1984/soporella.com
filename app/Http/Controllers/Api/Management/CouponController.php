<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Coupon;
use App\Country;
use Str;


class CouponController extends Controller
{
    public function index() {

    	$data = array();
    	$coupons = Coupon::get();

    	$data['coupons'] = $coupons;

		return response()->json($data, 200);
    }
    public function updateStatus(Request $request, Category $category) {
    	
    	$data = array();
    	$data['status'] = 0;

    	$category->active = $category->active?0:1;
    	$status = $category->save();

    	if($status) {
    		$data['status'] = 1;
    		$data['message'] = "Successfully update status";
    	}
    	return response()->json($data, 200);

    }
   
    public function store(Request $request) {

		$data = array();
		$categories = Country::whereActive(1)->get();

		$validated = $request->validate([
		    'coupon' => 'required|max:255',
		]);

		 $active = false;

	      if($request->input('active') == 'true') {
	        $active = 1;
	      }
	      elseif ($request->input('active') == 'false') {
	         $active = 0;
	      }
	      else {
	        $active = $request->input('active')?1:0;
	      }

		$category = Coupon::create([
		  'active' => $active,
		  'coupon' => $request->input('coupon'),
		  'discount_amount' =>  $request->input('discount_amount'),
		]);


		if ($category) {
			$data['status'] = 1;
			$data['message'] = "Successfully added new record";
		}

		return response()->json($data, 200);

    }
    public function update(Request $request, Coupon $coupon) {
    	
    	$data = array();
		$categories = Country::whereActive(1)->get();

		$validated = $request->validate([
		    'title' => 'required|max:255',
		]);

		$category->active = $request->input('active')?1:0;
		$category->coupon = $request->input('coupon');
		$category->discount_amount = $request->input('discount_amount');

		$category->save();

		if ($category) {
			$data['status'] = 1;
			$data['message'] = "Successfully updated record";
		}

		return response()->json($data, 200);

    }
    public function destroy(Request $request, Coupon $Coupon) {
    	
      $data = array();

      $data['status'] = 0;
      $data['message'] = "Unable to delete record. Please try again.";

      if (!$category) response()->json($data, 200);

      $coupon = Coupon::find($category->id);
      $status = $coupon->delete();

      if ($status) {
        $data['status'] = 1;
        $data['message'] = "Successfully deleted record";
      }

      return response()->json($data, 200);
    }
}
