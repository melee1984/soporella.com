<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Campaign;
use App\Attraction;
use App\Country;

class CampaignController extends Controller
{
    public function index() {

    	$data = array();
    	$campaigns = Campaign::get();

    	foreach($campaigns as $campaign) {

        if ($campaign->attraction) {
          $campaign->large_img = $campaign->populateCampaignImage(1,1);
          $campaign->img_1 = $campaign->populateCampaignImage(0,1); // display the image 
          $campaign->attraction->language_string = $campaign->attraction->convertLanguageField();
        }
    		
    	}

    	$data['campaigns'] = $campaigns;

    	$data['display_options'] = array(
    							array('id'=>1, 'value'=>'Option 1'),
    							array('id'=>2, 'value'=>'Option 2'),
    							array('id'=>3, 'value'=>'Option 3'),
    							array('id'=>4, 'value'=>'Option 4'),
							);

    	$data['attractions'] = Attraction::select('id', 'title')
    							->whereActive(1)
    							->get();

      $data['language'] = Country::select('id', 'country_code', 'country_name')
                              ->whereActive(1)
                              ->get();

		return response()->json($data, 200);
    }
    
    public function updateStatus(Request $request, Campaign $campaign) {
    	
    	$data = array();
    	$data['status'] = 0;

      
    	$campaign->active = $campaign->active?0:1;
    	$status = $campaign->save();

    	if($status) {
    		$data['status'] = 1;
    		$data['message'] = "Successfully update status";
    	}
    	return response()->json($data, 200);

    }

    public function updateMenu(Request $request, Category $category) {
    	
    	$data = array();
    	$data['status'] = 0;

    	$category->is_menu = $category->is_menu?0:1;
    	$status = $category->save();

    	if($status) {
    		$data['status'] = 1;
    		$data['message'] = "Successfully update status";
    	}

    	return response()->json($data, 200);
    }
    public function store(Request $request) {

    		$data = array();

    		$validated = $request->validate([
    		    'attraction_id' => 'required|max:255',
    		]);

        $active = false;

        if($request->input('active') == 'true') {
          $active = 1;
        }
        elseif ($request->input('active') == 'false') {
           $active = 0;
        }
        else {
          $active = $request->input('active')?1:0;
        }

    		$campaign = Campaign::create([
    		  'active' => $active,
    		  'slider' => $request->input('slider')=='true'?1:0,
    		  'attraction_id' =>  $request->input('attraction_id'),
    		  'display_option' =>  $request->input('display_option'),
    		  'discount_string' =>  $request->input('discount_string'),
          'country_code' =>  $request->input('country_code'),
          
    		]);

    		if ($campaign->display_option == 1) {
    			if ($request->has('file')) {
            $campaign->large_img = $this->upload($request, $campaign); 
    			}
    		}

        if ($campaign->display_option == 2) {
          if ($request->has('file')) {
            $campaign->img_1 = $this->upload($request, $campaign); 
          }
        }

         if ($campaign->display_option == 4) {
          if ($request->has('file')) {
            $campaign->img_1 = $this->upload($request, $campaign); 
          }
        }

    		$campaign->save();

    		if ($campaign) {
    			$data['status'] = 1;
    			$data['message'] = "Successfully added new record";
    		}

		return response()->json($data, 200);

    }
    public function update(Request $request, Campaign $campaign) {
    	
    	$data = array();

  		$validated = $request->validate([
  		    'attraction_id' => 'required|max:255',
  		]);

      $active = false;

      if($request->input('active') == 'true') {
        $active = 1;
      }
      elseif ($request->input('active') == 'false') {
         $active = 0;
      }
      else {
        $active = $request->input('active')?1:0;
      }

      $campaign->active = $active;
      $campaign->slider = $request->input('slider')=='true'?1:0;
  		$campaign->attraction_id = $request->input('attraction_id');
  		$campaign->display_option = $request->input('display_option');
  		$campaign->discount_string = $request->input('discount_string');
      $campaign->country_code = $request->input('country_code');

  		if ($campaign->display_option == 1) {
  			if ($request->has('file')) {
  				$campaign->large_img = $this->upload($request, $campaign);	
  			}
  		}

      if ($campaign->display_option == 2) {
        if ($request->has('file')) {
          $campaign->img_1 = $this->upload($request, $campaign, 2); 
        }
      }
      
      if ($campaign->display_option == 4) {
          if ($request->has('file')) {
              $campaign->img_1 = $this->upload($request, $campaign, 2); 
          }
        }
		
		  $campaign->save();


		if ($campaign) {
			$data['status'] = 1;
			$data['message'] = "Successfully updated record";
		}

		return response()->json($data, 200);

    }

     public function upload($request, $campaign, $img_for = 1) {

    	request()->validate([
				'file' => 'required|image|mimes:jpeg,png,jpg',
	       ]);

        $data = array();
        $image = $request->file('file');
        $filename   = now()->toDateString()."-".$image->getClientOriginalName();

       	try {

       		$this->unlinkImage($campaign, $img_for);

       		$originalDirectory = public_path().'/uploads/images/'.$campaign->attraction_id . "/campaign";

    		try {
    			
  			   if (!file_exists($originalDirectory)) {
  	            mkdir($originalDirectory, 0755, true);
	         }

    		} catch (Exception $e) {

    			\Log('Error when uploading image ');

  				$data['message'] = "Uploading image failed";
  				$data['status'] = 0;
  				return response()->json($data, 200);

    		}

	       	$image->move($originalDirectory."/",$filename);

          return $filename; 
	   			
       	} catch (Exception $e) {

         		$data['message'] = "An error occur:" . $e;
  			     $data['status'] = 0;
       	}

		// return response()->json($data, 200);

	}

	public function unlinkImage($campaign, $img_for) {

		$originalDirectory = public_path().'/uploads/images/'.$campaign->attraction_id."/campaign";
   		// $originalDirectoryThumb = public_path().'/uploads/'.$product->id ."/thumb";

   		// Removing existing image from here 
   		if ($campaign->large_img !="") {

        if ($img_for == 1) {
          $deleteFile = $originalDirectory."/".$campaign->large_img;    
        }
        else {
          $deleteFile = $originalDirectory."/".$campaign->img_1;
        }
			
			// $deleteFileThumbnail = $originalDirectory."/thumb/".$product->img;
			\File::delete($deleteFile);
			// \File::delete($deleteFileThumbnail);
       	}

	}

    public function destroy(Request $request, Campaign $campaign) {
    	
      $data = array();

      $data['status'] = 0;
      $data['message'] = "Unable to delete record. Please try again.";

      if (!$campaign) response()->json($data, 200);

      $delete = Campaign::find($campaign->id);
      $status = $delete->delete();

      if ($status) {

        $this->unlinkImage($campaign, 1);
      	$this->unlinkImage($campaign, 2);
      	
        $data['status'] = 1;
        $data['message'] = "Successfully deleted record";
      }

      return response()->json($data, 200);
    }

    public function destroyImg(Request $request, Campaign $campaign, $option) {
      
      $data = array();

      $data['status'] = 0;
      $data['message'] = "Unable to update record. Please try again.";

      if (!$campaign) response()->json($data, 200);

      $camUpdate = Campaign::find($campaign->id);
      if ($option=='banner') {
        $this->unlinkImage($campaign, 1);
        $camUpdate->large_img = "";
      }
      else {
        $this->unlinkImage($campaign, 2);
        $camUpdate->img_1 = "";
      }

      $status = $camUpdate->save();

      if ($status) {
        $data['status'] = 1;
        $data['message'] = "Successfully updated record";
      }

      return response()->json($data, 200);
    }

    


}
