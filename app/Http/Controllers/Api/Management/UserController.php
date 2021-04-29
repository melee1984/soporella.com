<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
      public function index() {
    	$data = array();

    	$user = User::all();

    	$data['user'] = $user;

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
    public function updateMenu(Request $request, Category $category) {
    	
    	$data = array();
    	$data['status'] = 0;

    	$category->is_menu = $category->is_menu?0:1;
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
		    'title' => 'required|max:255',
		]);

		$category = Category::create([
			  'active' => $request->input('active')?1:0,
			  'is_menu' => $request->input('is_menu')?1:0,
			  'sorting' =>  $request->input('sorting'),
		]);

		$new_array = array();

		foreach($categories as $country) {
			if (session()->get('locale')==$country->country_code) {
			  $new_array[$country->country_code] = array (
			        'title' =>  $request->input('title'), 
			      );
			}
			else {
			    $new_array[$country->country_code] = array (
			        'title' => "", 
			    );
			}
		}

		// Just recreating the slug if the locale is english 
		if (session()->get('locale') == "en") {
			$category->slug = Str::slug($request->input('title'));
		}

		$category->language_string = serialize($new_array);
		$category->save();

		if ($category) {
			$data['status'] = 1;
			$data['message'] = "Successfully added new record";
		}

		return response()->json($data, 200);

    }
    public function update(Request $request, Category $category) {
    	
    	$data = array();
		$categories = Country::whereActive(1)->get();

		$validated = $request->validate([
		    'title' => 'required|max:255',
		]);

		$category->active = $request->input('active')?1:0;
		$category->is_menu = $request->input('is_menu')?1:0;
		$category->sorting = $request->input('sorting');

		$new_array = array();

		$currentData = $category->languageField();

		foreach($categories as $country) {
			if (session()->get('locale')==$country->country_code) {
			  $new_array[$country->country_code] = array (
			        'title' =>  $request->input('title'), 
			      );
			}
			else {
			    $new_array[$country->country_code] =   $currentData[$country->country_code];
			}
		}

		// Just recreating the slug if the locale is english 
		if (session()->get('locale') == "en") {
			$category->slug = Str::slug($request->input('title'));
		}

		$category->language_string = serialize($new_array);
		$category->save();

		if ($category) {
			$data['status'] = 1;
			$data['message'] = "Successfully updated record";
		}

		return response()->json($data, 200);

    }
    public function destroy(Request $request, Category $category) {
    	
      $data = array();

      $data['status'] = 0;
      $data['message'] = "Unable to delete record. Please try again.";

      if (!$category) response()->json($data, 200);

      $category = Category::find($category->id);
      $status = $category->delete();

      if ($status) {
        $data['status'] = 1;
        $data['message'] = "Successfully deleted record";
      }

      return response()->json($data, 200);
    }
}
