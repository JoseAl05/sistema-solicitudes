<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\SolicitudDeVentas;
use App;

class Reportes extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
	
	public function obtenerReporte()
	{
		$solicitudes = SolicitudDeVentas::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
        $chart = \Charts::database($solicitudes, 'bar', 'highcharts')
			      ->title("Cantidad de Solicitudes Anuales")
			      ->elementLabel("Cantidad de Solicitudes")
			      ->dimensions(1000, 500)
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);
		return view('Reportes',compact('chart'));
	}
	
	
}
