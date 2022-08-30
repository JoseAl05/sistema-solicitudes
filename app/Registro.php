<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    //
	
	public function Usuario()
	{
		return $this->belongsTo('App\User');
	}
	
}
