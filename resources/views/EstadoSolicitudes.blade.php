@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<div class="formatoBuscar">
		<h1><b>Buscar Solicitudes</h1></b>
		<form id="formSolicitud"  method="post" action="{{ route('ver_solicitud') }}">
			{{csrf_field()}}
			<label for="solicitud" style="display:inline-block">Ingrese número de solicitud que desea revisar</label>
			<div class="buscarSolicitud">
				<input type="text" class="form-control" id="solicitud" name="solicitud" required>
			</div>
			<br>
			<div class="botonBuscar">
				<button type="submit" class="btn btn-primary">Ver Solicitud</button>
			</div>
		</form>
	</div>

@endsection