<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Attraction;
use App\Promotion;
use DB;

class PromotionController extends Controller
{
    public function index() {

    	$data = array();

    	$records = Attraction::select('id','title', DB::raw('(select count(id) from promotions where attraction_id = attractions.id) as mapped'))
                    ->whereActive(1)
                    ->get();	

    	$data['records'] = $records;

		return response()->json($data, 200);
    }

    public function store(Request $request, Attraction $attraction) {

    	if (!$attraction) return; 

        $exist = Promotion::whereAttractionId($attraction->id)->first();

        if ($exist) {
	          $exist->delete();
	          $data['status'] = 1;
	          $data['message'] = "Successfully deleted attraction";

        } else {

          $prmotionMapping = Promotion::create([ 
            'attraction_id' => $attraction->id,
          ]);

          if ($prmotionMapping) {
            $data['status'] = 1;
            $data['message'] = "Successfully added attraction";
          }

        }
        return response()->json($data, 200);


    }
}
