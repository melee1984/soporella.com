<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class CategoryAttractionMapping extends Model
{
    protected $table = 'category_attraction_mapping';
    protected $fillable = ['attraction_id', 'category_id'];

    /**
     * Get the relation attractions 
     * @return object 
     */
    public function attraction()
    {
        return $this->belongsTo('App\Attraction', 'attraction_id', 'id');
    }	
    

}
