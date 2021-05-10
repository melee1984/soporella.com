<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Shopping\Cart;
use App\User;
use App\Attraction;
use App\Campaign;
use App\Status;

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
    	
        $orders = Cart::whereUserId(Auth::User()->id)
                    ->whereNotNull('submitted_at') 
                    ->orderBy('created_at', 'asc')->get();

        $user = User::all();
        $attraction = Attraction::whereActive(1)->get();
        $campaign = Campaign::whereActive(1)->get();

    	return view('management.pages.dashboard', compact('orders','user', 'attraction', 'campaign'));

    }
    /**
     * [view description]
     * @param  Cart   $cart [description]
     * @return [type]       [description]
     */
    public function view(Cart $cart) {

        $status = Status::all();

        return view('management.pages.orders.attached', compact('cart', 'status'));

    }

    /**
     * [list description]
     * @return [type] [description]
     */
   	public function list() 
    {	  
        $orders = Cart::whereUserId(Auth::User()->id)
                    ->whereNotNull('submitted_at') 
                    ->orderBy('created_at', 'asc')->get();

		return view('management.pages.orders.orders', compact('orders') );
    }

    
}
