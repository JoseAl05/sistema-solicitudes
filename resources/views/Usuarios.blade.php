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
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@include('sweet::alert')
	<section class="container mt-5 pt-5">	
		<ol class="breadcrumb">
			<li class="breadcrumb-item active"><a href="{{ route('administrador')}}">Perfil</a></li>
			<li class="breadcrumb-item active"> Usuarios Registrados </li>
			<li class="breadcrumb-item active"><a href="{{ route('administradorTabla')}}"> Ver Solicitudes </a></li>
			<li class="breadcrumb-item active"><a href="{{ route('reportes')}}">Ver Registros del Sistema</a></li>
		</ol>
		<div class="container">
			<h3 class="text-uppercase text-center"><b>USUARIOS</b></h3>
				<div class="tablaSolicitudes">
					<form id="formEstado" name="formEstado" method="post" action="{{ route('estadoSolicitud', '$solicitud->id')}}">
					{{csrf_field()}}
						<table id="tablaUsuarios" class="table table-bordered" style="align:center">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>E-Mail</th>
									<th>Rol</th>
								</tr>
							</thead>
							<tbody>
							@foreach($usuarios as $usuario)
								<tr>
									<td>{{$usuario['name']}}</td>
									<td>{{$usuario['email']}}</td>
									@if($usuario->type == 'solicitante')
										<td bgcolor="orange"><b>{{$usuario['type']}}</b></td>
									@endif
									@if($usuario->type == 'autorizador')
										<td bgcolor="blue"><b>{{$usuario['type']}}</b></td>
									@endif
									@if($usuario->type == 'admin')
										<td bgcolor="#006600"><b>{{$usuario['type']}}</b></td>
									@endif
									@if($usuario->type == 'default')
										<td><a href="{{ route('modificarUsuario', $usuario->id) }}" class="btn btn-primary">Editar</a></td>
									@endif
								</tr>
							@endforeach
							</tbody>
						</table>
						<a class="btn btn-primary" href="{{ route('administrador')}}" role="button"> Volver al Perfil </a>
					</form>
				</div>
			</div>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaUsuarios').dataTable();
		});
	</script>
@endsection