@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
	
	<section class="container mt-5 pt-5">	
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('solicitante')}}">Perfil</a></li>
			<li class="breadcrumb-item active"><a href="{{ route('Solicitud')}}"> Agregar Solicitud </a></li>
			<li class="breadcrumb-item active">Ver Estados de Solicitud</li>
		</ol>
		<h1 class="page-header" align="center">ESTADOS DE SOLICITUDES</h1>
		<div class="container">
				<div class="tablaSolicitudes">
					<table id="tablaEstados" style="align:center" class="table table-bordered">
						<thead>
							<tr>
								<th>Numero de Solicitud</th>
								<th>Unidad Solicitante</th>
								<th>Fecha</th>
								<th>Estado de Solicitud</th>
								<th>Ver Solicitud</th>
							</tr>
						</thead>
						<tbody>
							@foreach($solicitudes as $solicitud)
								@if($solicitud->user_id == Auth::user()->id)
									<tr class="solicitud{{$solicitud->id}}">
										<td scope="col">{{$solicitud['id']}}</td>
										<td scope="col">{{$solicitud['UnidadSolicitante']}}</td>
										<td scope="col">{{$solicitud->created_at->format('d.m.Y')}}</td>
										@if($solicitud->estadoSolicitud == 'Aprobada')
											<td bgcolor="green" scope="col">{{$solicitud['estadoSolicitud']}}</td>
										@endif
										@if($solicitud->estadoSolicitud == 'Rechazada')
											<td bgcolor="red" scope="col">{{$solicitud['estadoSolicitud']}}</td>
										@endif
										@if($solicitud->estadoSolicitud == 'Pendiente')
											<td bgcolor="gray" scope="col">{{$solicitud['estadoSolicitud']}}</td>
										@endif
										@if($solicitud->estadoSolicitud == 'Anulada')
											<td bgcolor="red" scope="col">{{$solicitud['estadoSolicitud']}}</td>
										@endif
										@if($solicitud->estadoSolicitud == 'Compra En Ejecucion')
											<td bgcolor="orange" scope="col">{{$solicitud['estadoSolicitud']}}</td>
										@endif
										@if($solicitud->estadoSolicitud == 'Compra Realizada')
											<td bgcolor="green" scope="col">{{$solicitud['estadoSolicitud']}}</td>
										@endif
										<td scope="col"><a class="btn btn-primary" href="{{ route('SolicitudSolicitante',$solicitud)}}">Ver Solicitud</a></td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaEstados').dataTable();
		});
	</script>

@endsection