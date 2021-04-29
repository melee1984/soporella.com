<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Promotions 
     * @return view 
     */
    public function index() 
    {	
		
    	$users = User::paginate(100);

		return view('management.pages.users.view', compact('users'));
    }
}
