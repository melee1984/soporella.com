<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
        return $this->attraction->photo = asset('products/images/'.$this->attraction->photo);
    }
    /**
     * [scopePopulateAttractionPageURL description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopePopulateAttractionPageURL($query) {
        
        return $this->attraction->pageUrl = route('page.attraction.view', $this);
    }
    /**
     * [rates description]
     * @return [type] [description]
     */
    public function rates()
    {
        return $this->hasMany('App\Models\Attraction\AttractionRateHeader')
            ->with('details');
    }
    /**
     * [interestedIn description]
     * @return [type] [description]
     */
    public function interestedIn()
    {
        return $this->hasMany('App\Models\Attraction\InterestedIn')->with('attraction');
            
    }

}
