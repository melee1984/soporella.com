<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * About us 
     * @return return view
     */
    public function aboutus() 
    {
    	return view('front.pages.aboutus');
    }
    /**
     * About us 
     * @return return view
     */
    public function sellticketwithus() 
    {
    	return view('front.pages.sellticketwithus');
    }
    /**
     * About us 
     * @return return view
     */
    public function disclaimer() 
    {
    	return view('front.pages.disclaimer');
    }
    /**
     * terms and conditions 
     * @return return view
     */
    public function termsandconditions() 
    {
    	return view('front.pages.termsandconditions');
    }
    /**
     * privacy policy
     * @return return view
     */
    public function primvacypolicy() 
    {
    	return view('front.pages.primvacypolicy');
    }
    /**
     * shipping and return policy 
     * @return return view
     */
    public function shippingandreturnpolicy() 
    {
    	return view('front.pages.shippingandreturnpolicy');
    }
    /**
     * contactus 
     * @return return view
     */
    public function contactus() 
    {
    	return view('front.pages.contactus');
    }
    /**
     * Sitemap 
     * @return return view
     */
    public function sitemap() 
    {
    	return view('front.pages.sitemap');
    }
       
}
