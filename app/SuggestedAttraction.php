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
}
