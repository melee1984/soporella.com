<?php

namespace App\Models\Attraction;

use Illuminate\Database\Eloquent\Model;
use App\Country;

class AttractionRateDetails extends Model
{
    protected $table = 'atttraction_item_details';
    protected $fillable = ['title','attraction_rate_header_id', 'price', 'markdown_price', 'active'];
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

    public function computePricedOnTheCountrySelected() {
        $conversion = session()->get('conversion');
        return number_format(ceil((float)$this->price * (float) $conversion), 2);
    }
    public function computeMarkdownPricedOnTheCountrySelected() {
        $conversion = session()->get('conversion');
        
        if ($this->markdown_price>1)  {
            return number_format(ceil((float)$this->markdown_price * (float) $conversion), 2);
        }
        else {
            return 0;
        }

    }
    
    public function getCurrency() {
        return session()->get('currency');
    }
    
    /**
     * Get the text based on the selected locale
     * @return [type] [description]
     */
    public function convertLanguageField() 
    {   
        $array_string = unserialize($this->language_string);
  
        $toBeReturnString = "";
        if (session()->has('locale')) {
           $c = session()->get('locale');
        }
        else {
            $c = App::getLocale();    
        }

        if (array_key_exists($c, $array_string)) {
            return $array_string[$c];
        }
        else {
            return  array('title' => '');
        }
    }   
    /**
     * Language 
     * @return [type] [description]
     */
    public function languageField() 
    {
       return unserialize($this->language_string);
    }   
    

}
