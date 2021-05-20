<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Newsletter;

class NewsletterController extends Controller
{
    /**
     * About us 
     * @return return view
     */
    public function subscribe(Request $request) 
    {   	

    	$data = array();

		$validated = $request->validate([
		    'email' => 'required|email|unique:newsletter',

		]);

       	$newsletter = new Newsletter;
       	$newsletter->email = $request->input('email');
       	$status = $newsletter->save();

       	 if ($status) {
        	$data['status'] = 1;
        	$data['message'] = "You have successfully subscribe to our newsletter.";
        }

        return response()->json($data, 200);

    }
}
