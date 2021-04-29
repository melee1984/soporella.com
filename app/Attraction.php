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
	protected $fillable = ['title', 'short_description', 'description', 'active', 'photo', 'slug', 'redemption', 'availability'];

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
        $array_string = unserialize($this->language_string);

        $toBeReturnString = "";
        
        $c = App::getLocale();
        
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
