<?php

namespace App\Models\Shopping;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    protected $table = 'cart_details';

	protected $fillable = ['cart_id', 
						'attraction_id', 
						'attraction_detail_id',
						'variance_details', 
						'variance_total', 
						'selected_date', 
						'sub_total', 
						'total_qty'];
	
    public $timestamps = true;

    public function attraction() 
    {
         return $this->hasOne('App\Attraction', 'id', 'attraction_id');
    }

     public function attractiondetails() 
    {
         return $this->hasOne('App\Models\Attraction\AttractionRateDetails', 'id', 'attraction_detail_id')
                        ->with('rateHeader');
    }

}
