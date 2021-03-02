<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
	protected $fillable = ['attraction_id', 'sorting'];
    public $timestamps = true;

    /**
     * Relationship iwth the category attraction mapping 
     * @return object
     */
    public function attraction()
    {
        return $this->belongsTo('App\Attraction', 'attraction_id', 'id');
    }
}
