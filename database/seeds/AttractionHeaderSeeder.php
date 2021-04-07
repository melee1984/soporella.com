<?php

use Illuminate\Database\Seeder;
use App\Models\Attraction\AttractionRateHeader; 
use App\Models\Attraction\AttractionRateDetails;

class AttractionHeaderSeeder extends Seeder
{
      private $details = [
	        [
	        	'attraction_id' => 1,
	            'title' => 'Extra Admission',
	            'active' => 1,
	            'is_required' => 1,
	        ],
	        [
	        	'attraction_id' => 1,
	            'title' => 'General Admission',
	            'active' => 1,
	            'is_required' => 1,
	        ],
	        [
	        	'attraction_id' => 2,
	            'title' => 'Classic (valid for 1 day)',
	            'active' => 1,
	            'is_required' => 1,
	        ],
	         [
	        	'attraction_id' => 2,
	            'title' => 'Premium (valid for 2 days)',
	            'active' => 1,
	            'is_required' => 1,
	        ],
				        
    ];

    public function run() {

    	$dataValue = [
    		['title' => 'Child',
    		'price'	=> 250,
    		'active' => 1,
    		'currency' => 'AED'],

    		['title' => 'Adult',
    		'price'	=> 300,
    		'active' => 1,
    		'currency' => 'AED'],
    	];

    	foreach($this->details as $detail) {

    		$header = AttractionRateHeader::create($detail);	

    		foreach($dataValue as $val) {

    			$attractionRateDetails = new AttractionRateDetails;
	    		$attractionRateDetails->attraction_rate_header_id = $header->id;
				$attractionRateDetails->title = $val['title'];
				$attractionRateDetails->price = $val['price'];
				$attractionRateDetails->markdown_price = 0;
				$attractionRateDetails->active = $val['active'];
				$attractionRateDetails->currency =  $val['currency'];
	    		$attractionRateDetails->save();
	    			
    		}

    	}
    }
}
