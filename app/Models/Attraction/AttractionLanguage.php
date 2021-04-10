<?php

namespace App\Models\Attraction;

use Illuminate\Database\Eloquent\Model;

class AttractionLanguage extends Model
{
	protected $table = 'attractions_language';
    protected $fillable = ['attraction_id', 'language_code', 'title', 'photo', 'short_description', 'description', 'availability','redemption', 'policy', 'video'];
    public $timestamps = false;

    
}
