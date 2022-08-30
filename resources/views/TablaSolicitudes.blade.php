@extends('layouts.app')

@section('content')
<head>
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@include('sweet::alert')
</head>
	<section class="container mt-5 pt-5">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('autorizador')}}">Perfil</a></li>
			<li class="breadcrumb-item active"> Ver Solicitudes </li>
		</ol>
		<h1 class="page-header" align="center">SOLICITUDES</h1>
		<div class="container">
				<div class="tablaSolicitudes">
				@foreach($autorizadores as $autorizador)
					<form id="formEstado" name="formEstado" method="post" action="{{ route('estadoSolicitud',$autorizador->id)}}">
					{{csrf_field()}}
				@endforeach
						<table class="table table-bordered" style="align:center" id="tablaSolicitudes">
							<thead>
								<tr>
									<th>Numero de Solicitud</th>
									<th>Unidad Solicitante</th>
									<th>Usuario</th>
									<th>Establecimiento</th>
									<th>Fecha</th>
									<th>Estado Solicitud</th>
									<th>Ver Solicitud</th>
									<th>Editar Solicitud</th>
								</tr>
							</thead>
							<tbody>
							@foreach($autorizadores as $autorizador)
								<tr>
									<td>{{$autorizador['id']}}</td>
									<td>{{$autorizador['UnidadSolicitante']}}</td>
									@foreach($usuarios as $usuario)
										@if($autorizador->user_id == $usuario->id)
											<td>{{$usuario->name}}</td>
											<td>{{$usuario->Establecimiento}}</td>
										@endif
									@endforeach
									<td>{{$autorizador->created_at->format('d.m.Y')}}</td>
									<td>{{$autorizador->estadoSolicitud}}</td>
									<td><a href="{{ route('VerSolicitud', $autorizador->id)}}" class="btn btn-primary">Ver Solicitud</a></td>
									@if($autorizador->estadoSolicitud =='Aprobada')
										<td><a href="{{ route('editarEstado', $autorizador->id) }}" class="btn btn-warning">Editar Estado</a></td>
									@endif
									@if($autorizador->estadoSolicitud =='Rechazada')
										<td><a href="{{ route('editarEstado', $autorizador->id) }}" class="btn btn-warning">Editar Estado</a></td>
									@endif
									@if($autorizador->estadoSolicitud =='Pendiente')
										<td><a href="{{ route('editarEstado', $autorizador->id) }}" class="btn btn-warning">Editar Estado</a></td>
									@endif
									@if($autorizador->estadoSolicitud == 'Compra Realizada' || $autorizador->estadoSolicitud == 'Anulada' || $autorizador->estadoSolicitud == 'Compra En Ejecucion')
										<td>No se puede editar</td>
									@endif
								</tr>
							@endforeach
							</tbody>
						</table>
					</form>
				</div>
		</div>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaSolicitudes').dataTable();
		});
	</script>
@endsection

