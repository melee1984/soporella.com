<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class LanguageController extends Controller
{
    public function setLocale(Request $request) {

    	$lang = $request->input('lang');
		App::setLocale($lang);
		session()->put('locale', $lang);
		$data['status'] = 1;
		
		return response()->json($data, 200);
    }
}
