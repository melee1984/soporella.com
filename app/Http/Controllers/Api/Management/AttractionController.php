<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Attraction;
use App\Country;
use Str;
use Image;
use App\Models\Attraction\AttractionRateHeader;
use App\Models\Attraction\AttractionRateDetails;
use App\Category;
use DB;
use App\Models\Category\CategoryAttractionMapping;
use App\Models\Attraction\AttractionImage;

class AttractionController extends Controller
{
   public function update(Request $request, Attraction $attraction) {

   		$language_array = array();
        $new_array = array();

        $categories = Country::whereActive(1)->get();

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $attraction->title = $request->input('title');
        $attraction->active =$request->input('active')?1:0;
        $attraction->slug = Str::slug($request->input('title'));
        $attraction->video = $request->input('video');

        $currentData = $attraction->languageField();

        foreach($categories as $country) {
        	if (session()->get('locale')==$country->country_code) {
        		$new_array[$country->country_code] = array (
	                'availability' =>  $request->input('availability'), 
	                'redemption' =>  $request->input('redemption'), 
	                'about' =>  $request->input('about'), 
	                'description' => $request->input('description'), );
        	}
        	else {
				    $new_array[$country->country_code] =   $currentData[$country->country_code];
        	}
        }

        $attraction->language_string = serialize($new_array);

        $status = $attraction->save();

        if ($status) {
        	$data['status'] = 1;
        	$data['message'] = "Successfully updated attraction";
        }

        return response()->json($data, 200);

    }

    public function upload(Request $request, Attraction $attraction) {

    request()->validate([
			'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = array();
        $image = $request->file('file');

        $file = explode('.', $image->getClientOriginalName());
        $filename   = Str::slug(now()->toDateString()."-".$file[0]) .".". $image->getClientOriginalExtension();

       	try {

       		$this->unlinkImage($attraction);
       		$originalDirectory = public_path().'/uploads/images/'.$attraction->id;

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
	   			
			$attraction->photo = $filename;

			$status = $attraction->save();

			// append url 
			$attraction->populateAttractionImage();

			if ($status) {
				$data['img'] = $attraction->photo;
				$data['message'] = "Successfully uploaded new image";
				$data['status'] = 1;
			}
			else {
				$data['message'] = "Unable to upload image. Please refresh the page and try again. Thank you.";
				$data['status'] = 0;
			}

       	} catch (Exception $e) {
       		$data['message'] = "An error occur:" . $e;
			$data['status'] = 0;
       	}

		return response()->json($data, 200);

	}

	public function unlinkImage(Attraction $attraction) {

			$originalDirectory = public_path().'/uploads/images/'.$attraction->id;
       		// $originalDirectoryThumb = public_path().'/uploads/'.$product->id ."/thumb";

       		// Removing existing image from here 
       		if ($attraction->photo !="") {
				$deleteFile = $originalDirectory."/".$attraction->photo;
				// $deleteFileThumbnail = $originalDirectory."/thumb/".$product->img;
    			\File::delete($deleteFile);
    			// \File::delete($deleteFileThumbnail);
	       	}

	}

  public function rates(Attraction $attraction) {

    $data = array();
    $rates = $attraction->rates;

    foreach($rates as $rate) {
      $rate->language_string = $rate->convertLanguageField();

      foreach($rate->details as $detail) {
          $detail->language_string = $detail->convertLanguageField();
      }
  } 

    $data['rates'] = $rates;

    return response()->json($data, 200);

  }

  public function storeRates(Request $request, Attraction $attraction) {
    
      $data = array();
      $categories = Country::whereActive(1)->get();

      $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

      $attractionRateHeader = AttractionRateHeader::create([
          'active' => $request->input('active')?1:0,
          'sorting' =>  $request->input('sorting'),
          'attraction_id' => $attraction->id,
      ]);

      $new_array = array();

      // foreach($categories as $country) {
      //   if ('en'==$country->country_code) {
      //     $new_array[$country->country_code] = array (
      //           'description' =>  $request->input('description'), 
      //           'title' =>  $request->input('title  '), 
      //         );
      //   }
      //   else {
      //       $new_array[$country->country_code] = array (
      //           'description' =>  "", 
      //           'title' => "", 
      //       );
      //   }
      // }

      foreach($categories as $country) {
            $new_array[$country->country_code] = array (
                    'description' =>  $request->input('description'), 
                    'title' => $request->input('title'), );
        }
      
      $attractionRateHeader->language_string = serialize($new_array);
      $attractionRateHeader->save();

      if ($attractionRateHeader) {
        $data['status'] = 1;
        $data['message'] = "Successfully added new record";
      }

      return response()->json($data, 200);

  } 

  public function updateRates(Request $request, AttractionRateHeader $attractionRateHeader) {
    
      $data = array();
      $categories = Country::whereActive(1)->get();

      $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

      $attractionRateHeader->active = $request->input('active')?1:0;
      $attractionRateHeader->sorting =  $request->input('sorting');
    
      $currentData = $attractionRateHeader->languageField();

      $new_array = array();

      foreach($categories as $country) {
        if (session()->get('locale')==$country->country_code) {
          $new_array[$country->country_code] = array (
                'description' =>  $request->input('description'), 
                'title' =>  $request->input('title'), 
              );
        }
        else {
          $new_array[$country->country_code] =   $currentData[$country->country_code];
        }
      }

      $attractionRateHeader->language_string = serialize($new_array);
      $attractionRateHeader->save();

      if ($attractionRateHeader) {
        $data['status'] = 1;
        $data['message'] = "Successfully added new record";
      }

      return response()->json($data, 200);

  } 

  /**
   * [deleteRates description]
   * @param  Request              $request              [description]
   * @param  AttractionRateHeader $attractionRateHeader [description]
   * @return [type]                                     [description]
   */
  public function deleteRates(Request $request, AttractionRateHeader $attractionRateHeader) {

      $data = array();

      $data['status'] = 0;
      $data['message'] = "Unable to delete record. Please try again.";

      if (!$attractionRateHeader) response()->json($data, 200);

      $deleteAttractionRateHeader = AttractionRateHeader::find($attractionRateHeader->id);
      $status = $deleteAttractionRateHeader->delete();

      if ($status) {
        $data['status'] = 1;
        $data['message'] = "Successfully deleted record";
      }

      return response()->json($data, 200);
  }

  
  public function storeRateDetails(Request $request, AttractionRateHeader $attractionRateHeader) {

      $data = array();
      $categories = Country::whereActive(1)->get();

      $validated = $request->validate([
            'title' => 'required|max:255',
      ]);
      
      $attractionRateDetails = AttractionRateDetails::create([
          'price' => $request->input('price'),
          'attraction_rate_header_id' => $attractionRateHeader->id,
          'markdown_price' => $request->input('markdown_price'),
      ]);

      $new_array = array();

      foreach($categories as $country) {
        if (session()->get('locale')==$country->country_code) {
          $new_array[$country->country_code] = array (
                'title' =>  $request->input('title'), 
              );
        }
        else {
          $new_array[$country->country_code] = array (
                'title' => "", 
            );
        }
      }

      $attractionRateDetails->language_string = serialize($new_array);
      $attractionRateDetails->save();

      $attractionRateHeader->language_string = $attractionRateHeader->convertLanguageField();

      $details = $attractionRateHeader->details;

      foreach($details as $detail) {
          $detail->language_string = $detail->convertLanguageField();
      }

      $rateHeader = $attractionRateHeader;

      if ($attractionRateDetails) {
          $data['rateHeader'] = $rateHeader;  
          $data['status'] = 1;
          $data['message'] = "Successfully added new record";
      }

      return response()->json($data, 200);

  }

  public function updateRateDetails(Request $request, AttractionRateDetails $attractionRateDetail) {

      $data = array();
      $data['status'] = 0;

      $categories = Country::whereActive(1)->get();

      $validated = $request->validate([
            'title' => 'required|max:255',
      ]);

      $attractionRateDetail->price = $request->input('price');
      $attractionRateDetail->markdown_price = $request->input('markdown_price');

      $currentData = $attractionRateDetail->languageField();

      $new_array = array();

      foreach($categories as $country) {
        if (session()->get('locale')==$country->country_code) {
          $new_array[$country->country_code] = array (
                'title' =>  $request->input('title'), 
              );
        }
        else {
          $new_array[$country->country_code] =   $currentData[$country->country_code];
        }
      }

      $attractionRateDetail->language_string = serialize($new_array);
      $status = $attractionRateDetail->save();

      // Retrieve the data for this header 
      $rateHeader = $attractionRateDetail->rateHeader;
      $rateHeader->language_string = $rateHeader->convertLanguageField();

      foreach($rateHeader->details as $detail) {
          $detail->language_string = $detail->convertLanguageField();
      }
      
      if ($status) {
        $data['status'] = 1;
        $data['rateHeader'] = $rateHeader;
        $data['message'] = "Successfully updated rate variant";
      }
    
      return response()->json($data, 200);

  }

   public function deleteRateDetails(Request $request, AttractionRateDetails $attractionRateDetail) {

      $data = array();

      $data['status'] = 0;
      $data['message'] = "Unable to delete record. Please try again.";

      $rateHeader = $attractionRateDetail->rateHeader;
      
      $attractionRateDetail = AttractionRateDetails::find($attractionRateDetail->id);
      $status = $attractionRateDetail->delete();

      $rateHeader->language_string = $rateHeader->convertLanguageField();

      foreach($rateHeader->details as $detail) {
        $detail->language_string = $detail->convertLanguageField();
      }

      if ($status) {
          $data['rateHeader'] = $rateHeader;
          $data['status'] = 1;
          $data['message'] = "Successfully deleted record";
      }

      return response()->json($data, 200);
  }

 
  public function uploadGallery(Request $request, Attraction $attraction ) {

    request()->validate([
      'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

      $data = array();
      $image = $request->file('file');

        $file = explode('.', $image->getClientOriginalName());
        $filename   = Str::slug(now()->toDateString()."-".$file[0]) .".". $image->getClientOriginalExtension();

        try {

          $originalDirectory = public_path().'/uploads/images/'.$attraction->id . "/gallery";

        try {
          
          if (!file_exists($originalDirectory)) {
                mkdir($originalDirectory, 0755, true);
            }

        } catch (Exception $e) {
          \Log('Error when uploading gallery image ');

          $data['message'] = "Uploading image failed";
          $data['status'] = 0;
          return response()->json($data, 200);

          }
          $image->move($originalDirectory."/",$filename);
              
          $attractionImage = AttractionImage::create([
            'attraction_id' => $attraction->id,
            'sorting' => 1,
            'img' => $filename,
          ]);

          if ($attractionImage) {
            $data['message'] = "Successfully upload new image in your gallery";
            $data['status'] = 1;
          }
          else {
            $data['message'] = "Unable to upload image. Please refresh the page and try again. Thank you.";
            $data['status'] = 0;
          }

      } catch (Exception $e) {
        $data['message'] = "An error occur:" . $e;
        $data['status'] = 0;
      }

    return response()->json($data, 200);

  }  
  
 

}
