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
        $c = session()->get('locale');

        return $array_string[$c];
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
