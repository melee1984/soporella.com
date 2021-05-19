<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Response;


class ImageController extends Controller
{
    public function product(Request $request) {

    	$src = @$request->input('name');
		$size = @$request->input('s');

	 	$cacheimage = Image::cache(function($image) use ($src, $size) {

	 		$url = asset('uploads/images/'.$src); 

		    if ($size == 'thumb') {
			    // return $image->make($url)->resize(400, 400, function ($constraint) {
				   //  $constraint->aspectRatio();
				   //  $constraint->upsize();
		     //    });    
		     	
		     	$image->make($url)->img->resizeCanvas(400, 350, 'center', false, 'ff00ff');

		     	// $image->make($url)->resizeCanvas(400, 400, function ($constraint) {
				    // $constraint->aspectRatio();
				    // $constraint->upsize();
		      //   });    

		    }
		    elseif ($size == 'banner') {
		      return $image->make("uploads/images/".$src)->resize(500, 250, function ($constraint) {
		          $constraint->aspectRatio();
		      }); 
		    }
		    elseif ($size == 'orig') {
		     return $image->make('uploads/images/'.$src)->resize(500, 350, function ($constraint) {
		          $constraint->aspectRatio();
		      }); 
		      // Thumbnail
		      // return $image->make($src)->resize(150, 150, function ($constraint) {
		      //     $constraint->aspectRatio();
		      // }); 
		    }
	  }, 5, false); // one minute cache expiry'

	  return Response::make($cacheimage, 200, array('Content-Type' => 'image/jpeg'));

    }
}
