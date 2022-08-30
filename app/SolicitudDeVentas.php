<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudDeVentas extends Model
{
    //
	//Solicitud pertenece a usuario
	public function User()
	{
		return $this->belongsTo('App\User');
	}
	public function Registro()
	{
		return $this->belongsTo('App\Registro');
	}
}
