<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestedAttraction extends Model
{
    protected $table = 'suggestion_attractions';
	protected $fillable = ['attraction_id', 'sorting'];
    public $timestamps = true;

    /**
     * Relationship iwth the category attraction mapping 
     * @return object
     */
    public function attractions()
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
        return $this->attraction->pageUrl = URL::to('visit/'.$this->attraction->slug);
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
