<?php

namespace App\Models\Attraction;

use Illuminate\Database\Eloquent\Model;

class AttractionRateHeader extends Model
{
    protected $table = 'attraction_item_header';
    protected $fillable = ['attraction_id', 'title', 'active', 'is_required'];
    public $timestamps = true;

    public function details()
    {
        return $this->hasMany('App\Models\Attraction\AttractionRateDetails');            
    }

}
