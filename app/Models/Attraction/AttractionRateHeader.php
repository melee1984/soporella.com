<?php

namespace App\Models\Attraction;

use Illuminate\Database\Eloquent\Model;
use App;

class AttractionRateHeader extends Model
{
    protected $table = 'attraction_item_header';
    protected $fillable = ['attraction_id', 'title', 'active', 'is_required', 'description'];
    public $timestamps = true;

    public function details()
    {
        return $this->hasMany('App\Models\Attraction\AttractionRateDetails');            
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
            return  array(
                    'description' => '', 
                    'title' => '',
                );

            
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
