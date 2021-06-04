<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Country;

class LanguageController extends Controller
{
    public function setLocale(Request $request) {

    	$lang = $request->input('lang');
		App::setLocale($lang);
		session()->put('locale', $lang);
		$data['status'] = 1;
		
		return response()->json($data, 200);
    }

    public function index() {
    	$data = array();
    	$Languages = Country::get();

    	$data['languages'] = $Languages;

		return response()->json($data, 200);
    }

    public function updateStatus(Request $request, Country $country) {
    	
    	$data = array();
    	$data['status'] = 0;

    	$country->active = $country->active?0:1;
    	$status = $country->save();

    	if($status) {
    		$data['status'] = 1;
    		$data['message'] = "Successfully update status";
    	}
    	return response()->json($data, 200);

    }

   
    public function store(Request $request) {

		$data = array();

		$validated = $request->validate([
		    'country_name' => 'required|max:255',
		    'country_code' => 'required',
		]);

		$country = Country::create([
			  'active' => $request->input('active')?1:0,
			  'country_code' =>  $request->input('country_code'),
			  'country_name' =>  $request->input('country_name'),
			  'fla_icon' =>  $request->input('fla_icon'), 
			  'conversion' =>  $request->input('conversion'),
			  'currency' =>  $request->input('currency'),
			  'flag' => $request->input('fla_icon'), 
		]);

		$country->save();

		if ($country) {
			$data['status'] = 1;
			$data['message'] = "Successfully added new record";
		}

		return response()->json($data, 200);

    }
    public function update(Request $request, Country $country) {
    	
    	$data = array();

		$validated = $request->validate([
		    'country_name' => 'required|max:255',
		    'country_code' => 'required',
		]);

		$country->active = $request->input('active')?1:0;
		$country->country_code = $request->input('country_code');
		$country->country_name = $request->input('country_name');
		$country->fla_icon = $request->input('fla_icon');
		$country->conversion = $request->input('conversion');
		$country->currency = $request->input('currency');

		$country->save();

		if ($country) {
			$data['status'] = 1;
			$data['message'] = "Successfully updated record";
		}

		return response()->json($data, 200);

    }
    public function destroy(Request $request, Country $country) {
    	
      $data = array();

      $data['status'] = 0;
      $data['message'] = "Unable to delete record. Please try again.";

      if (!$country) response()->json($data, 200);

      $country = Country::find($country->id);
      $status = $country->delete();

      if ($status) {
        $data['status'] = 1;
        $data['message'] = "Successfully deleted record";
      }

      return response()->json($data, 200);
    }


}
