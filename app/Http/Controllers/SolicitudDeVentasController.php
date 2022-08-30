<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App;
use App\User;
use App\SolicitudDeVentas;
use Alert;
use Image;
use Storage;

class SolicitudDeVentasController extends Controller
{
    //
	
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
    {
        return view('agregarSolicitud');
    }
	
	
	//Funcion que agrega a la base de datos la informacion ingresada para la solicitud de compra. //
	public function agregarSolicitud(Request $request)
	{
		$solicitud = new App\SolicitudDeVentas;
			$solicitud->UnidadSolicitante = $request->unidad;
			$solicitud->NombreBienServicio = $request->nombre;
			$solicitud->DetalleBienServicio = json_encode($request->detalle);
			$solicitud->UnidadDeMedida = json_encode($request->unidadMedida);
			$solicitud->CantidadRequerida = json_encode($request->cantidad);
			$solicitud->JustificacionBienServicio = $request->justificacion;
			$solicitud->Observaciones = $request->observaciones;
			$solicitud->fechaAproximada = $request->fechaAprox;
			$idUser = \Auth::user()->id;
			$solicitud->User()->associate($idUser);
			$solicitud->save();
		Alert::success('Éxito', 'Solicitud agregada correctamente');
		return redirect()->back();
	}
}
