<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
	protected $fillable = ['attraction_id', 'sorting', 'display_option', 'discount_string', 'title', 'active', 'description', 'img_2', 'img_1', 'large_img', 'slider'];
    public $timestamps = true;

    /**
     * Relationship iwth the category attraction mapping 
     * @return object
     */
    public function attraction()
    {
        return $this->hasOne('App\Attraction', 'id', 'attraction_id')
                        ->with('rates')
                        ->with('images');
    }

    /**
     * Populate Photo asset url 
     * @param  object 
     * @return return tempalted url for photo
     */
    public function scopePopulateAttractionImage($query) {
        return asset('uploads/images/'.$this->attraction->id.'/'.$this->attraction->photo);
    }

    /* Extra function */
    /**
     * Populate Page URL for the Attractions 
     * 
     * @return return templated page URL contract in the object
     */
    public function scopePopulateAttractionPageURL($query) {
        return $this->attraction->pageUrl = route('page.promotion', $this->attraction);
    }

    /**
     * Populate Photo asset url 
     * @param  object 
     * @return return tempalted url for photo
     */
    public function scopePopulateCampaignImage($query, $large=false, $im) {
        
        if ($large) {
            return asset('uploads/images/'.$this->attraction->id.'/campaign/'.$this->large_img);
        }
        else {
            if ($im==1) {
                if ($this->img_1!="") {
                    return asset('uploads/images/'.$this->attraction->id.'/campaign/'.$this->img_1);    
                }
                return "";
            }
            else {
                return asset('uploads/images/'.$this->attraction->id.'/campaign/'.$this->img_2);
            }
        }
    }
    

}
