<?php

namespace App\Models\Attraction;

use Illuminate\Database\Eloquent\Model;

class InterestedIn extends Model
{
   	protected $table = 'attraction_interestedin';
    protected $fillable = ['attraction_id', 'reference_id'];
    public $timestamps = false;

    public function attraction()
    {
        return $this->hasOne('App\Attraction', 'id', 'reference_id');            
    }
    /**
     * Populate Photo asset url 
     * @param  object 
     * @return return tempalted url for photo
     */
    public function scopePopulateAttractionImage($query) {
        return $this->attraction->photo = asset('uploads/images/'.$this->attraction->id.'/'.$this->attraction->photo);
    }
    /**
     * [scopePopulateAttractionPageURL description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopePopulateAttractionPageURL($query) {
        
        return $this->attraction->pageUrl = route('page.attraction.view', $this->attraction->slug);
    }


}
