<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Cache;

use App\Models\Shopping\Cart;
use App\Models\Shopping\Tickets;
use App\Models\Shopping\CartDetails;
use URL;
use Auth;
use Hash;
use ZipArchive;

class ProfileController extends Controller
{
    public function profile() 
	{
     	$menus = Cache::remember('menus', 30, function () {
            $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });


        return view('front.pages.user.profile', compact('menus'));
    }

    public function reset() 
    {
        $menus = Cache::remember('menus', 30, function () {
            $menus = Category::forMenu()->active()->get();

            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

        return view('front.pages.user.reset', compact('menus'));
    }

    public function updatePassword(Request $request) {

        $validator = $request->validate([
            'newpassword' => 'required|min:4',
            'confirmpassword' => 'required|same:newpassword|min:4',
        ]);

        $request->User()->password =  Hash::make($request->input('newpassword'));
        $request->User()->save();

        return redirect()->route('profile.information');

    }   
    
    /**
     * Tickets
     * @return [type] [description]
     */
    public function tickets() 
    {
        $currency = "";

        $menus = Cache::remember('menus', 30, function () {
            $menus = Category::forMenu()->active()->get();
            foreach ($menus as $category) {
                $category->language_string = $category->convertLanguageField();
            }
            return $menus;
        });

        $orders = Cart::whereUserId(Auth::User()->id)
                    ->whereNotNull('submitted_at') 
                    ->orderBy('created_at', 'asc')->get();

       foreach($orders as $cart) {


             $currency = $cart->currency;

            foreach($cart->details as $detail) {

                $detail->attractiondetails;
                $detail->attraction;
                
                $detail->attraction->populateAttractionImage();
                $detail->attraction->populateAttractionPageURL();

                $detail->attraction->url = route('page.attraction.view', $detail->attraction);
                $detail->variance_total = number_format($detail->variance_total, 2)  . " " . $currency;
                // Just to format response 
                $detail->variance_details = unserialize($detail->variance_details);

                $variance_updated = array();

                foreach($detail->variance_details as $variance) {

                    $copied_array = array('rate_detail_id' => $variance['rate_detail_id'],
                                            'title' => $variance['title'],
                                            'price' => number_format($variance['price'], 2) . " " . $variance['currency'],
                                            'qty' => $variance['qty'],
                                            'currency' => $variance['currency'],
                                            'sub_total' => number_format($variance['price'] * $variance['qty'], 2) . " " . $variance['currency'],

                                        );

                    array_push($variance_updated, $copied_array);

                }

                $detail->variance_converted = $variance_updated;
            }


       }


        return view('front.pages.user.tickets', compact('menus', 'orders'));

    }


    public function download($cartId) {

        $tickets = Tickets::whereCartId($cartId)->get();

        if (count($tickets) > 0) {

            // Define Dir Folder
            $public_dir=public_path();
            // Zip File Name
            $zipFileName = count($tickets).'-'.$cartId.'-download.zip';
            // Create ZipArchive Obj
            $zip = new ZipArchive;

            if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
                // Add File in ZipArchive
                // 
                foreach($tickets as $ticket) {
                    $file_path = "uploads/tickets/".$ticket->cart_id."/".$ticket->filename;    
                    $zip->addFile($file_path, $ticket->filename);
                }
                // Close ZipArchive     
                $zip->close();
            }
            // Set Header
            $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
            $filetopath=$public_dir.'/'.$zipFileName;
            // Create Download Response
            if(file_exists($filetopath)){
                return response()->download($filetopath,$zipFileName,$headers);
            }
            else {

                echo "Unable to download file. Please contact system administrator. Thank you";
                die();

            }

        } 
        else {
            echo "Ticket not found";
            die();
        }
        
   
       // return view('createZip');

    }
    
    
}



