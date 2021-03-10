<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Attraction extends Model
{	
	use SoftDeletes;

	protected $table = 'attractions';
	public $timestamps = true;
	protected $fillable = ['title', 'short_description', 'description', 'active', 'photo', 'slug'];

	/**
     * Populate Photo asset url 
     * @param  object 
     * @return return tempalted url for photo
     */
    public function scopePopulateAttractionImage($query) {
        return $this->attraction->photo = asset('products/images/'.$this->attraction->photo);
    }
    
}
