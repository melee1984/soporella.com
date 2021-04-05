<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Str;
use Validator;
use Hash;
use Session;
use Auth;
use URL;
use App\User;
use App\Models\Shopping\Cart;

class LoginController extends Controller
{
   	private $apiToken;
	public function __construct()
	{
		// Unique Token
		$this->apiToken = uniqid(base64_encode(Str::random(60)));
	}

	/**
   * Update the authenticated user's API token.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  	public function update(Request $request)
  {
      $token = Str::random(60);
      $request->user()->forceFill([
          'api_token' => hash('sha256', $token),
      ])->save();

      return ['token' => $token];
  }

   /**
   * Client Login
   */
  public function login(Request $request)
  { 
    // Validations
    $rules = [
      'email'=>'required|email',
      'password'=>'required|min:4'
    ];

    $session_id = Session::getId();

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
      // Validation failed
      return response()->json([
        'status' => 0,
        'errorDisplay' => 'alert-danger',
        'message' => "The username and password you've enter might be incorrect. Please try again."
      ]);
    } else {
      // Fetch User
      $user = User::where('email',$request->email)->first();
      
      if($user) {

        // Verify the password
        if( password_verify($request->password, $user->password) ) {
          
          Auth::login($user);
          Session::setId($session_id);

          // updating cart to avoid issue 
          $cart = Cart::whereSessionId($session_id)->first();

          if ($cart) {
            $cart->user_id = $user->id;
            $cart->save();  
          }
          // Update Token
          $postArray = ['api_token' => $this->apiToken];
          $login = User::where('email',$request->email)->update($postArray);

          if($login) {

          	if ($request->input('page') =="shopping-cart/basket") {
          		$pageURL = route('checkout');
          	}
          	else {
          		$pageURL = URL::to($request->input('page'));
          	}

            return response()->json([
              'status'    =>  1,
              'name'         => $user->firstname . " " . $user->lastname,
              'firstname'    => $user->firstname,
              'lastname'    => $user->lastname,
              'email'        => $user->email,
              'access_token' => $this->apiToken,
              'redirectURL' =>  $pageURL,
            ]);

          }
        } else {
          return response()->json([
          	'status' => 0,
            'message' => 'Invalid Password',
            'errorDisplay' => 'alert-danger',
          ]);
        }
      } else {
        return response()->json([
        	'status' => 0,
          'message' => 'User not found',
          'errorDisplay' => 'alert-danger',
        ]);
      }
    }
  }
	public function userlogout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}

	/**
	* Logout
	*/
	public function logout(Request $request)
	{
		$token = $request->header('Authorization');
		$user = User::where('api_token',$token)->first();
		if($user) {
		  $postArray = ['api_token' => null];
		  $logout = User::where('id',$user->id)->update($postArray);
		  if($logout) {
		    return response()->json([
		      'message' => 'User Logged Out',
		    ]);
		  }
		} else {
		  return response()->json([
		    'message' => 'User not found',
		  ]);
		}
	}

	public function refreshUser(Request $request) {
		return response()->json($request->user()->pullUserInfo(), 200);
	}

}
