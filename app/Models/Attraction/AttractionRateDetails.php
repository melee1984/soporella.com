<?php

namespace App\Models\Attraction;

use Illuminate\Database\Eloquent\Model;

class AttractionRateDetails extends Model
{
    protected $table = 'atttraction_item_details';
    protected $fillable = ['attraction_header_id', 'attraction_detail_id', 'price', 'markdown_price', 'active'];
        protected $hidden = ['updated_at', 'created_at'];

    public $timestamps = true;

    public function rateHeader() 
    {
         return $this->hasOne('App\Models\Attraction\AttractionRateHeader', 'id', 'attraction_rate_header_id');
    }

    public function getPrice() {
    	if ($this->markdown_price!="") {
    		return $this->markdown_price;
    	}
		return $this->price;
    }


}
