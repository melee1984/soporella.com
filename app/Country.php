<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
	protected $fillable = ['country_code', 'active', 'country_name', 'fla_icon', 'conversion', 'currency', 'flag'];
    public $timestamps = true;
}
