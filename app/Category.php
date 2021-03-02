<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{	
	use SoftDeletes;

	protected $table = 'categories';
	protected $fillable = ['title', 'active', 'slug'];
    public $timestamps = true;

    /**
     * Relationship iwth the category attraction mapping 
     * @return object
     */
    public function attractionsMapping()
    {
        return $this->hasMany('App\Models\Category\CategoryAttractionMapping', 'category_id', 'id');
    }

}
