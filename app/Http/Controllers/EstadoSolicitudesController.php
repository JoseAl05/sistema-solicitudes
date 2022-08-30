<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudDeVentas;
use App;


class EstadoSolicitudesController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		return view('EstadoSolicitudes');
	}



	//Funcion que muestra los datos para la ficha de solicitud de compra//
	public function mostrarDatos($id)
	{
		$mostrarSolicitud =  SolicitudDeVentas::where('id',$id)->first();
		return view('VerSolicitud', compact('mostrarSolicitud'));
	}
	
	
	//Funcion que muestra una tabla con los estados de solicitud al solicitante//
	public function mostrarEstados()
	{
		$solicitudes = App\SolicitudDeVentas::all();
		return view('TablaEstadosSolicitudes', compact('solicitudes'));
	}
	
	
	//Funcion que muestra la tabla con las solicitudes al autorizador//
	public function mostrarTabla()
	{
		$autorizadores = App\SolicitudDeVentas::all();
		$usuarios = App\User::all();
		return view('TablaSolicitudes',compact('autorizadores','usuarios'));
	}
	
	
	//Funcion que muestra la solicitud al solicitante//
	public function verSolicitud($id)
	{
		$solicitud = SolicitudDeVentas::where('id',$id)->first();
		return view('VerSolicitudSolicitante',compact('solicitud'));
	}
		
}
