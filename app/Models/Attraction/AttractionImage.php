<?php

namespace App\Models\Attraction;

use Illuminate\Database\Eloquent\Model;

class AttractionImage extends Model
{
    protected $table = 'attraction_images';
	protected $fillable = ['attraction_id', 'sorting', 'img'];
    public $timestamps = true;
    
    public function scopePopulateAttractionGalleryImage($query) {

        return asset('uploads/images/'.$this->attraction_id.'/gallery/'.$this->img);
    }

}
