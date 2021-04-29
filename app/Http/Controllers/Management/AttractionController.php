<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Attraction;
use App\Category;
use Str;
use App\Country;

class AttractionController extends Controller
{
  
  /**
     * Management Login 
     * @return view 
     */
    public function index() 
    {	
    	$attractions = Attraction::paginate(50);
        return view('management.pages.attraction', compact('attractions'));
    }
    /**
     * Edit Attractions 
     * @param  Attractions $attraction [description]
     * @return [type]                  [description]
     */
    public function show(Attraction $attraction) 
    {   
        $attraction->language_string  = $attraction->languageField();
        $attraction->populateAttractionImage();

        return view('management.pages.attractions.edit', compact('attraction'));
    }
    public function add() 
    {   
        $categories = Category::whereActive(1)->get();

        return view('management.pages.attractions.add', compact('categories'));
    }
    public function store(Request $request) {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $attraction = Attraction::create([
            'title' => $request->input('title'),
            'active' => $request->input('active')?1:0,
            'slug' => Str::slug($request->input('title')),
        ]);

        $language_array = array();
        $categories = Country::whereActive(1)->get();
        $new_array = array();

        foreach($categories as $country) {
            $new_array[$country->country_code] = array (
                    'short_description' =>  $request->input('short_description'), 
                    'description' => $request->input('description'), );
        }
      
        $attraction->language_string = serialize($new_array);

        $status = $attraction->save();

        if ($status) {

            // if you have any other process that you need to include you may add below line
            // 
        }

        return redirect(route('dashboard.management.edit', $attraction))
                ->with('display', 'alert alert-success')
                ->with('message','Successfully added new attraction.');

    }



}
