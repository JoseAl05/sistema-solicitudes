<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SolicitudDeVentas;
use App;
use Illuminate\Support\Facades\DB;
use RezaAr\Highcharts\Facade;
use Charts;


class ReporteController extends Controller
{
    //
	//Funcion que obtiene las fechas de la base de datos y crea un grafico que muestra la cantidad de solicitudes
	//totales, aprobadas y rechazadas que se han ingresado al sistema//
	public function obtenerReporte()
	{
		$solicitudes = SolicitudDeVentas::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
						->get();
		$chart = Charts::database($solicitudes, 'bar', 'highcharts')
					  ->title("Registro General Mensual de Solicitudes")
					  ->colors(['#190096','#db1702','#dd6b00','#efd300','#00efaf','#00a3ef','#003182','#9f91ff','#8000d6','#8e03a0','#720009','#000000'])
					  ->elementLabel("Cantidad de Solicitudes")
					  ->dimensions(1000, 500)
					  ->responsive(false)
					  ->groupByMonth(date('Y'), true);
		$solicitudes2 = SolicitudDeVentas::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
						->where('estadoSolicitud', '=','Compra Realizada')
						->get();
		$chart2 = Charts::database($solicitudes2, 'bar', 'highcharts')
					  ->title("Registro Mensual de Compras Realizadas")
					  ->colors(['#00aa05','#db1702','#dd6b00','#efd300','#00efaf','#00a3ef','#003182','#9f91ff','#8000d6','#8e03a0','#720009','#000000'])
					  ->elementLabel("Cantidad de Compras Realizadas")
					  ->dimensions(600, 300)
					  ->responsive(false)
					  ->groupByMonth(date('Y'), true);					  
		return view('ReportesGenerales',compact('chart','chart2','chart3','chart4'));
	}
}
