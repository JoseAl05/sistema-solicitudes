<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\SolicitudDeVentas;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

///***SOLICITANTE***///
Route::get('/PerfilSolicitante','PerfilSolicitanteController@mostrarPerfil')->middleware('is_solicitante')->name('solicitante');
Route::get('/Solicitud','SolicitudDeVentasController@index')->middleware('is_solicitante')->name('agregarSolicitud');
Route::get('/EstadoSolicitudes','EstadoSolicitudesController@index')->middleware('is_solicitante')->name('EstadoSolicitudes');
Route::get('/TablaEstadosSolicitudes','EstadoSolicitudesController@mostrarEstados')->middleware('is_solicitante')->name('VerTabla');
Route::get('/EstadosSolicitudes','EstadoSolicitudesController@mostrarEstados')->middleware('is_solicitante')->name('EstadosSolicitudes');
Route::get('/VerSolicitudSolicitante/{id}','EstadoSolicitudesController@verSolicitud')->middleware('is_solicitante')->name('SolicitudSolicitante');
Route::post('/Solicitud', 'SolicitudDeVentasController@agregarSolicitud')->middleware('is_solicitante')->name('Solicitud');


///***AUTORIZADOR***///
Route::get('/PerfilAutorizador','PerfilAutorizadorController@mostrarPerfil')->middleware('is_autorizador')->name('autorizador');
Route::get('/TablaSolicitudes','EstadoSolicitudesController@mostrarTabla')->middleware('is_autorizador')->name('autorizadorTabla');
Route::get('/EditarEstado/{id}','PerfilAutorizadorController@editarEstado')->middleware('is_autorizador')->name('editarEstado');
Route::get('/VerSolicitud/{NumeroSolicitud}','EstadoSolicitudesController@mostrarDatos')->middleware('is_autorizador')->name('VerSolicitud');
//Route::get('/TablaSolicitudes/{id}','PerfilAutorizadorController@modificarEstado')->middleware('is_autorizador')->name('autorizadorEstado');
Route::patch('/EditarEstado/{id}','PerfilAutorizadorController@modificarEstado')->middleware('is_autorizador')->name('estadoSolicitud');

///***ADMINISTRADOR***///
Route::get('/PerfilAdministrador','PerfilAdministradorController@mostrarPerfil')->middleware('is_admin')->name('administrador');
Route::get('/ModificarUsuario/{id}','PerfilAdministradorController@agregarUsuario')->middleware('is_admin')->name('modificarUsuario');
Route::get('/Usuarios','PerfilAdministradorController@showAll')->middleware('is_admin')->name('mostrarUsuarios');
Route::get('/TablaSolicitudesAdministrador','PerfilAdministradorController@mostrarTabla')->middleware('is_admin')->name('administradorTabla');
Route::patch('/ModificarUsuario/{id}','PerfilAdministradorController@modificarUsuario')->middleware('is_admin')->name('editarUsuario');
Route::get('/VerSolicitudAdministrador/{id}','PerfilAdministradorController@mostrarDatos')->middleware('is_admin')->name('VerSolicitudAdministrador');
Route::get('/ReportesGenerales','ReporteController@obtenerReporte')->middleware('is_admin')->name('reportes');
Route::get('/EjecutarSolicitud/{id}','PerfilAdministradorController@modificarEstado')->middleware('is_admin')->name('ejecutarSolicitud');
Route::patch('/EjecutarSolicitud/{id}','PerfilAdministradorController@editarEstado')->middleware('is_admin')->name('ejecutarEstadoSolicitud');
//Route::patch('/TablaSolicitudesAdministrador/{id}','PerfilAdministradorController@editarEstado')->middleware('is_admin')->name('ejecutarSolicitud');

Route::get('/home', 'HomeController@index')->name('home');
