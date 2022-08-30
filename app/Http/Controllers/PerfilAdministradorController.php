<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\SolicitudDeVentas;
use App;
use Alert;
use App\Mail\SolicitudEnProceso;
use App\Mail\SolicitudRealizada;
use App\Mail\SolicitudAnulada;

class PerfilAdministradorController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		return view('AgregarUsuario');
	}
	
	
	//Funcion que muestra el perfil del administrador. //
	public function mostrarPerfil()
	{
		$usuario = App\User::all();
		$administrador =  User::where('type', 'admin')->first();
		return view('PerfilAdministrador',compact('administrador','usuario','idUsuario'));
	}
	
	
	//Funcion que retorna la vista para modificar usuario pasandole por parametros el usuario encontrado
	//el nombre del usuario.//
	public function agregarUsuario($id)
	{
		
		$usuario = App\User::find($id);
		
		if($usuario->type == 'default')
		{
			$nombre = $usuario->name;
			$updater = App\User::where('id',$usuario->id)->first();
			return view('ModificarUsuario',compact('usuario','updater','nombre'));
		}
	}
	
	//Funcion que modifica el rol del usuario. //
	public function modificarUsuario(Request $request, $id)
	{
		$user = App\User::find($id);
		if($request->type != NULL)
		{
			$user->type = $request->type;
		}
		Alert::success('Éxito', 'Editado Correctamente');
		$user->save();
		return redirect()->route('mostrarUsuarios');
	}
	
	
	//Funcion que muestra todos los usuarios registrados que no tienen un rol definido. //
	public function showAll()
	{
		$usuarios = App\User::all();
		return view('Usuarios',compact('usuarios'));
	}
	
	
	//Funcion que muestra los datos ingresados en una ficha de solicitud de compra.//
	public function mostrarDatos($id)
	{
		$mostrarSolicitud =  SolicitudDeVentas::where('id',$id)->first();
		return view('VerSolicitudAdministrador', compact('mostrarSolicitud'));
	}
	
	//Funcion que muestra la tabla de solicitudes para el administrador. //
	public function mostrarTabla()
	{
		$administradores = \App\SolicitudDeVentas::all();
		$usuarios = \App\User::all();
		return view('TablaSolicitudesAdministrador', compact('administradores','usuarios'));
	}
	
	//Funcion que edita el estado de la solicitud ya aprobada (En Ejecucion,En Procesos,Anulada)//
	public function editarEstado(Request $request, $id)
	{
		$solicitud = \App\SolicitudDeVentas::find($id);
		if($request->estado != NULL)
		{
			$solicitud->estadoSolicitud = $request->estado;
		}
		if($request->observacion != NULL)
		{
			$solicitud->Observaciones = $request->observacion;
		}
		$solicitud->save();
		$user = \App\User::find($solicitud->user_id);
		$email = $user->email;
		if($solicitud->estadoSolicitud == 'Compra En Ejecucion')
		{
			\Mail::to($email)->send(new SolicitudEnProceso($solicitud));
		}
		if($solicitud->estadoSolicitud == 'Compra Realizada')
		{
			\Mail::to($email)->send(new SolicitudRealizada($solicitud));
		}
		if($solicitud->estadoSolicitud == 'Anulada')
		{
			\Mail::to($email)->send(new SolicitudAnulada($solicitud));
		}
		Alert::success('Éxito', 'Editado Correctamente');
		return redirect()->route('administradorTabla');	
	}
	
	public function modificarEstado($id)
	{
		$solicitud = \App\SolicitudDeVentas::find($id);
		return view('EjecutarSolicitud',compact('solicitud'));
	}
}
