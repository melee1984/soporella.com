<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{	
	use SoftDeletes;

	protected $table = 'categories';
	protected $fillable = ['title', 'active', 'slug','is_menu'];
    public $timestamps = true;

    /**
     * Relationship iwth the category attraction mapping 
     * @return object
     */
    public function attractionsMapping()
    {
        return $this->hasMany('App\Models\Category\CategoryAttractionMapping', 'category_id', 'id');
    }
    /**
     * Menu with active status 
     * @param  [type] $query [description]
     * @return object with filtered 
     */
    public function scopeForMenu($query)
    {
        return $query->where('is_menu', 1);
    }
     /**
     * Menu with active status 
     * @param  [type] $query [description]
     * @return object with filtered 
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Get the text based on the selected locale
     * @return [type] [description]
     */
    public function convertLanguageField() 
    {   
        $array_string = unserialize($this->language_string);
  
        $toBeReturnString = "";
        $c = session()->get('locale');

        return $array_string[$c];
    }   
    /**
     * Language 
     * @return [type] [description]
     */
    public function languageField() 
    {
       return unserialize($this->language_string);
    }   
    
}
