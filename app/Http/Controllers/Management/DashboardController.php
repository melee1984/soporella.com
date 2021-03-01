<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    
    /**
     * Management Login 
     * @return view 
     */
    public function login() 
    {
		return view('management.pages.login');
    }
    /**
     * [logout description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function logout(Request $request) 
    {
	  Auth::logout();
	  return redirect('/dashboard/login');
	}
	/**
	 * Validate Logins
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function validateLogin(Request $request) {

    	$this->validate($request, [
	        'email' => 'required|email',
	        'password' => 'required',
	    ]);

	    $remember_me = $request->has('remember') ? true : false; 

	    if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me))
	    {
	         $user = auth()->user();

	         if ($user->isAdmin()) {
	         	return redirect()->intended('dashboard');   	
	         }
	         else {
	        	return back()
	        	->with('display', 'alert-danger')
	        	->with('message','The access you have does not have role to access Admin Dashboard. Please contact system administrator to fix this.')
	        	->withInput(); 	
	         }
	     	 
	    }
	    else{
	        return back()
	        	->with('display', 'alert-danger')
	        	->with('message','Your username and password are wrong.')
	        	->withInput();
	    }
   	}	

   /**
     * Index Dashboard Page 
     * @return [type] [description]
     */
    public function index() 
    {
    	return view('management.pages.dashboard');
    }
}
