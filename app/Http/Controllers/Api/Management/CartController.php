<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Shopping\Cart;
use App\Models\Shopping\Tickets;
use Str;

class CartController extends Controller
{
    public function uploadFiles(Request $request, Cart $cart) {

    	$data = array();
    	$data['status'] = 0;
    	$data['message'] = "Unable to process your request. Please try again.";

		if (!$cart) {
			return response()->json($data, 200);
		}

		$cart->status_id = $request->input('status');
		$status = $cart->save();
		// 
		
		if($request->hasFile('files')) { 

			$files = $request->file('files');
			foreach($files as $fileinput) {
				$this->uploadFileTicket($cart, $fileinput);
			}

		}

		$data['status'] = 1;
		$data['message'] = "Successfully updated status";

		return response()->json($data, 200);

	}  

	public function uploadFileTicket(Cart $cart, $file) {
    
		$data = array();
		$image = $file;
		$filename   = now()->toDateString()."-".$image->getClientOriginalName();
        try {
          	$originalDirectory = public_path().'/uploads/tickets/'.$cart->id."";
	        try {
	          
	          if (!file_exists($originalDirectory)) {
	                mkdir($originalDirectory, 0755, true);
	            }

	        } catch (Exception $e) {

	          	 \Log('Error when uploading gallery image ');

		          $data['message'] = "Uploading failed";
		          $data['status'] = 0;
		          return response()->json($data, 200);
	        }

	        $image->move($originalDirectory."/",$filename);
         		
         	$ticket = new Tickets;
         	$ticket->filename = $filename;
         	$ticket->cart_id = $cart->id; 
         	$ticket->save();

	    } catch (Exception $e) {
	        \Log('Error when uploading gallery image ');
	    }

  	}  

  	public function deleteFile(Tickets $ticket) {
  		
  		if (!$ticket) {
  			echo "Invalid Ticket";
  			die();
  		}
		
		$cart = Cart::find($ticket->cart_id);
		
		$this->unlinkFile($ticket);

  		$deleteTicket = Tickets::find($ticket->id);
  		$deleteTicket->delete();

  		return redirect(route('dashboard.order.view', $cart));
  	}

  	public function unlinkFile(Tickets $ticket) {

		$originalDirectory = public_path().'/uploads/tickets/'.$ticket->cart_id;
   		// $originalDirectoryThumb = public_path().'/uploads/'.$product->id ."/thumb";

   		// Removing existing image from here 
   		if ($ticket->filename !="") {
			$deleteFile = $originalDirectory."/".$ticket->filename;
			// $deleteFileThumbnail = $originalDirectory."/thumb/".$product->img;
			\File::delete($deleteFile);
			// \File::delete($deleteFileThumbnail);
       	}

	}

}
