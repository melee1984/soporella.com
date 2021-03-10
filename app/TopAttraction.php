<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopAttraction extends Model
{
	protected $table = 'top_attractions';
	protected $fillable = ['attraction_id', 'sorting'];
	public $timestamps = true;

	/**
	 * Display Top Attractions 
	 */
	public function attraction()
    {
        return $this->hasMany('App\Attraction', 'attraction_id', 'id');
    }

    /* Extra function */
    /**
     * Populate Page URL for the Attractions 
     * 
     * @return return templated page URL contract in the object
     */
    public function scopePopulateAttractionPageURL($query) {
        return $this->attraction->pageUrl = route('page.top', $this->attraction);
    }
    /**
     * Populate Photo asset url 
     * @param  object 
     * @return return tempalted url for photo
     */
    public function scopePopulateAttractionImage($query) {
        return $this->attraction->photo = asset('products/images/'.$this->attraction->photo);
    }

}
