<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


use Cache;
use App\Category;
use Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $menus = Cache::remember('menus', 30, function () {
           $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });
            
        return view('auth.register', compact('menus'));
    }

   /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'mobile' => ['required'],
            // 'street_address' => ['required'],
            // 'city' => ['required'],
            // 'postal_code' => ['required'],
            // 'state_province' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $token = Str::random(60);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['areacode'] ." ". $data['mobile'],
            // 'street_address' => $data['street_address'],
            // 'city' => $data['city'],
            // 'postal_code' => $data['postal_code'],
            // 'state_province' => $data['state_province'],
            // 'optCountry' => $data['optCountry'],
            'api_token' => hash('sha256', $token),
            'password' => Hash::make($data['password']),
        ]);

    }
}
