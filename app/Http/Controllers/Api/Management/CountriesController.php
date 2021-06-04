<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Country;

class CountriesController extends Controller
{
    public function getList() {
    	
    	$data = array();
    	
    	$data['countries'] = Country::whereActive(1)->get(['country_code', 'country_name', 'fla_icon']);

		return response()->json($data, 200);
    }
}
