<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index() {
    	
    	return view('management.pages.campaign.campaign');
    }	

}
