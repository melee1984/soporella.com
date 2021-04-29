<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
   	protected $table = 'status';
	protected $fillable = ['title', 'description'];
	public $timestamps = true;
}
