<?php

namespace App\Models\Shopping;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'cart_tickets';
	protected $fillable = ['cart_id', 'filename'];
    public $timestamps = true;

    public function downloadURLFile() {
    	$this->downloadURLFile= asset('uploads/tickets/'.$this->cart_id."/".$this->filename);
    }

}
