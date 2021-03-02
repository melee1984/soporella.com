<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
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
