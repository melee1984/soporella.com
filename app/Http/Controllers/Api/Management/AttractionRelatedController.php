<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\AttractionRelated;
use App\Attraction;
use App\Country;
use App\Category;
use Str;
use DB;

class AttractionRelatedController extends Controller
{
    public function index(Attraction $attraction) {

    	$data = array();
    	
		$attractions = Attraction::select('id','title', DB::raw('(select count(id) from attraction_related where reference_id = attractions.id and attraction_id = '.$attraction->id . ') as mapped'))
                    ->whereActive(1)
                    ->where('id', '!=', $attraction->id)
                    ->get();	

       $data['record'] = $attractions;

		return response()->json($data, 200);
    }
    
    
    public function store(Request $request, Attraction $attraction, $refIn) {
    	
    	if (!$attraction) return; 
        
        $exist = AttractionRelated::whereAttractionId($attraction->id)->whereReferenceId($refIn)->first();
        if ($exist) {
          $exist->delete();
          $data['status'] = 1;
          $data['message'] = "Successfully deleted attraction";

        } else {
          $categoryAttractionMapping = AttractionRelated::create([ 
            'reference_id' =>  $refIn,
            'attraction_id' => $attraction->id,
          ]);
          if ($categoryAttractionMapping) {
            $data['status'] = 1;
            $data['message'] = "Successfully added related item";
          }
        }
        return response()->json($data, 200);
    		

    }

}
