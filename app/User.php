<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	
	const ADMIN_TYPE = 'admin';
	const SOLICITANTE_TYPE = 'solicitante';
	const AUTORIZADOR_TYPE = 'autorizador';
	const DEFAULT_TYPE = 'default';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','Establecimiento' ,'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	
	public function isAdmin()
	{
		return $this->type === self::ADMIN_TYPE;
	}
	
	public function isSolicitante()
	{
		return $this->type === self::SOLICITANTE_TYPE;
	}
	
	public function isAutorizador()
	{
		return $this->type === self::AUTORIZADOR_TYPE;
	}
	
	//Relacion 1 es a muchos Usuario/Solicitud
	public function Solicitud()
	{
		return $this->hasMany('App\SolicitudDeVentas');
	}
	
	//Relacion 1 es a muchos Usuario/Registro
	public function Registro()
	{
		return $this->hasMany('App\Registro');
	}
}
