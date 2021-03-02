<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopAttraction extends Model
{
	protected $table = 'top_attractions';
	protected $fillable = ['attraction_id', 'sorting'];
	public $timestamps = true;

	/**
	 * Display Top Attractions 
	 */
	public function attraction()
    {
        return $this->hasMany('App\Attraction', 'attraction_id', 'id');
    }

}
