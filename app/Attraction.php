<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cache;
use URL;
use App;

class Attraction extends Model
{	
	use SoftDeletes;

	protected $table = 'attractions';
	public $timestamps = true;
	protected $fillable = ['title', 'short_description', 'description', 'active', 'photo', 'slug', 'redemption', 'availability', 'language_string'];

	/**
     * Populate Photo asset url 
     * @param  object 
     * @return return tempalted url for photo
     */
    public function scopePopulateAttractionImage($query) {
        $this->photo = route('product.image') . '?s=thumb&name='.$this->id.'/'.$this->photo;
    }
    /**
     * [scopePopulateAttractionPageURL description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopePopulateAttractionPageURL($query) {
        
        return $this->pageUrl = route('page.attraction.view', $this);
    }
    /**
     * [rates description]
     * @return [type] [description]
     */
    public function rates()
    {
        return $this->hasMany('App\Models\Attraction\AttractionRateHeader')
                        ->with('details')
                        ->orderBy('sorting', 'asc');
    }   
    
    public function convertLanguageField() 
    {   
        
        if (!$this->language_string) return; 

            try {

                $array_string = unserialize($this->language_string);
                $toBeReturnString = "";
                // Priority the session and then the default// 
                if (session()->has('locale')) {
                    $c = session()->get('locale');
                }
                else {
                    $c = App::getLocale();    
                }

            } catch (Exception $e) {
                
            }

        return $array_string[$c];
    }   

    public function languageField() 
    {
       return unserialize($this->language_string);
    }       

    public function images()
    {
        return $this->hasMany('App\Models\Attraction\AttractionImage');
    }

      public function imagesLimit()
    {
        return $this->hasMany('App\Models\Attraction\AttractionImage')
                        ->limit(2);
    }

    /**
     * [interestedIn description]
     * @return [type] [description]
     */
    public function interestedIn()
    {
        return $this->hasMany('App\AttractionUpSell')
                    ->with('attraction');
            
    }   

    public function convertString() {
        dd($this);
    }

}
