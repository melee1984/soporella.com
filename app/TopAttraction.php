<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopAttraction extends Model
{
	protected $table = 'top_attractions';
	protected $fillable = ['attraction_id', 'sorting'];

	/**
	 * Display Top Attractions 
	 */
	
	public function attraction()
    {
        return $this->hasMany('Attractions', 'id', 'attraction_id');
    }
}
