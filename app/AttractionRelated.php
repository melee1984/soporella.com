<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionRelated extends Model
{
    protected $table = 'attraction_related';
	protected $fillable = ['attraction_id', 'reference_id'];
    public $timestamps = false;
}
