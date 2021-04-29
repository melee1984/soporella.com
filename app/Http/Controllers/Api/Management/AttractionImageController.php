<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Attraction;
use App\Models\Attraction\AttractionImage;
use Image;

class AttractionImageController extends Controller
{
    public function index(Attraction $attraction) {

    	$data = array();
    	$galleries = 	AttractionImage::whereAttractionId($attraction->id)->get();

    	foreach ($galleries as $gallery) {
    		$gallery->img = $gallery->populateAttractionGalleryImage();
    	}

       	$data['record'] = $galleries;
		return response()->json($data, 200);
    }
    public function destroy(Attraction $attraction, AttractionImage $image) {

    	$data['status'] = 0;
    	$deleteAttractionImage = AttractionImage::find($image->id);
    	if ($deleteAttractionImage) {
    		$this->unlinkImage($deleteAttractionImage, $attraction->id);
    		$deleteAttractionImage->delete();
    		$data['status'] = 1;
    	}

    	return response()->json($data, 200);
    }

    public function unlinkImage($image, $attractionId) {

			$originalDirectory = public_path().'/uploads/images/'.$attractionId.'/gallery';

       		if ($image->img !="") {
				$deleteFile = $originalDirectory."/".$image->img;
    			\File::delete($deleteFile);
	       	}

	}

}
