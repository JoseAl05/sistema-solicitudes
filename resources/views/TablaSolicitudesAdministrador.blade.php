@extends('layouts.app')

@section('content')
	<meta name="_token" content="{{csrf_token()}}" />
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	@include('sweet::alert')
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<section class="container mt-5 pt-5">	
		<ol class="breadcrumb">
			<li class="breadcrumb-item active"><a href="{{ route('administrador')}}">Perfil</a></li>
			<li class="breadcrumb-item active"><a href="{{ route('mostrarUsuarios', Auth::user())}}"> Usuarios </a></li>
			<li class="breadcrumb-item active"> Ver Solicitudes</li>
			<li class="breadcrumb-item active"><a href="{{ route('reportes')}}">Ver Registros del Sistema</a></li>
		</ol>
		<h1 class="page-header" align="center">SOLICITUDES</h1>
		<div class="container">
				<div class="tablaSolicitudes">
							<table class="table table-bordered" style="align:center" id="tablaAdministrador">
								<thead>
									<tr>
										<th>Numero de Solicitud</th>
										<th>Unidad Solicitante</th>
										<th>Usuario</th>
										<th>Establecimiento</th>
										<th>Estado de Solicitud</th>
										<th>Ver Solicitud</th>
										<th>Editar</th>
									</tr>
								</thead>
								<tbody>
								@foreach($administradores as $administrador)
													<tr>
														<td>{{$administrador['id']}}</td>
														<td>{{$administrador['UnidadSolicitante']}}</td>
														@foreach($usuarios as $usuario)
															@if($administrador->user_id == $usuario->id)
																<td>{{$usuario['name']}}</td>
																<td>{{$usuario['Establecimiento']}}</td>
															@endif
														@endforeach
														<td>{{$administrador->estadoSolicitud}}</td>
														<td><a href="{{ route('VerSolicitudAdministrador', $administrador->id)}}" class="btn btn-primary">Ver Solicitud</a></td>
														@if($administrador->estadoSolicitud == 'Pendiente')
															<td>Esta solicitud esta pendiente</td>
														@endif
														@if($administrador->estadoSolicitud == 'Rechazada')
															<td>No se puede modificar una Solicitud Rechazada</td>
														@endif	
														@if($administrador->estadoSolicitud == 'Compra Realizada')
															<td>Esta compra ya se realizó</td>
														@endif
														@if($administrador->estadoSolicitud == 'Aprobada')
															<td><a class="btn btn-warning" href=" {{route('ejecutarSolicitud',$administrador->id)}}">Editar</a></td>
														@endif
														@if($administrador->estadoSolicitud == 'Compra En Ejecucion')
															<td><a class="btn btn-warning" href=" {{ route('ejecutarSolicitud',$administrador->id)}}">Editar</a></td>
														@endif
														@if($administrador->estadoSolicitud == 'Anulada')
															<td><a class="btn btn-warning" href=" {{ route('ejecutarSolicitud',$administrador->id)}}">Editar</a></td>
														@endif
													</tr>
								@endforeach
								</tbody>
							</table>
				</div>
		</div>
	</section>
<script type="text/javascript">
	$(document).ready(function(){
			$('#tablaAdministrador').dataTable();
		});
		
</script>
@endsection