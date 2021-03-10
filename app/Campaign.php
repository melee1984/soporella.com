<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
	protected $fillable = ['attraction_id', 'sorting', 'title', 'description'];
    public $timestamps = true;

    /**
     * Relationship iwth the category attraction mapping 
     * @return object
     */
    public function attraction()
    {
        return $this->hasOne('App\Attraction', 'id', 'attraction_id');
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
