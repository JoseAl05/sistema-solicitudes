@extends('layouts.app')

@section('content')
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('css/style.css')}}">
		<script src="http://code.highcharts.com/highcharts.js"></script>
		<script src="//code.highcharts.com/highcharts.js"></script>
		<script src="//code.highcharts.com/modules/series-label.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
		<script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
	</head>
		<section class="container mt-5 pt-5">	
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="{{ route('administrador')}}">Perfil</a></li>
						<li class="breadcrumb-item active"><a href="{{ route('mostrarUsuarios', Auth::user())}}"> Usuarios Registrados </a></li>
						<li class="breadcrumb-item active"><a href="{{ route('administradorTabla')}}"> Ver Solicitudes </a></li>
						<li class="breadcrumb-item active">Ver Reporte del Sistema</li>
					</ol>
				</div>
			</div>
			<div class="panel-body">
				{!! $chart->html() !!}
			</div>
			<div class="panel-body" align="center">
				{!! $chart2->html() !!}
			</div>
		</section>
		{!! Charts::scripts() !!}
		{!! $chart->script()  !!}
		{!! $chart2->script() !!}
@endsection