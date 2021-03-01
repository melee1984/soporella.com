<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Attractions extends Model
{	
	use SoftDeletes;

	protected $table = 'attractions';
	public $timestamps = true;
	protected $fillable = ['title', 'short_description', 'description', 'active', 'photo', 'slug'];

	
}
