@extends('layouts.app')

@section('content')
<head>
	<meta name="_token" content="{{csrf_token()}}" />
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<meta name="_token" content="{{csrf_token()}}" />
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@include('sweet::alert')
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
</head>
	<section class="container mt-5 pt-5">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a href="{{ route('administrador')}}">Perfil</a></li>
					<li class="breadcrumb-item active"><a href="{{ route('mostrarUsuarios', Auth::user())}}"> Usuarios </a></li>
					<li class="breadcrumb-item active"><a href="{{ route('administradorTabla')}}"> Ver Solicitudes</a></li>
					<li class="breadcrumb-item active"><a href="{{ route('reportes')}}">Ver Registros del Sistema</a></li></li>
				</ol>
			</div>
		</div>
			<h3 class="text-uppercase text-center">MODIFICAR ESTADO DE SOLICITUD N° {{$solicitud->id}}</h3>
			<div class="container">
				<form method="post" name="formEditar" id="formEditar">
				{{csrf_field() }}
					{{method_field('PATCH')}}
						<div class="form-group row">
							<label for="estado" class="col-sm-2 form-control-label">Estado Solicitud: </label>
							<div class="selectTipo">
								<select name="estado" class="custom-select" id="estado">
									<option value="Compra En Ejecucion" class="form-control">Compra en Ejecucion</option>
									<option value="Anulada" class="form-control" selected>Anular Compra</option>
									<option value="Compra Realizada" class="form-control">Compra Realizada</option>
								</select>
							</div>
							<div class="textObs">
								<textarea class="form-control" name="observacion" cols="40" rows="5" id="observacion" placeholder="Ingrese observacion si es necesario" align="left";></textarea>
							</div>
						</div>
					<button class="btn btn-primary" id="botonEditar" onclick="editarEstado()">Cambiar estado de solicitud</button>
				</form>
			</div>
		</section>
	<script type="text/javascript">
		window.onload = function(){
			$.ajaxSetup({
				headers : {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}
			});
		}
		function editarEstado()
		{
			swal({
				title: 'Espera un momento!',
				text: 'Trabajando tu solicitud..',
				allowOutsideClick: true,
				allowEscapeKey: false,
				allowEnterKey: false,
				onOpen: () => {
					swal.showLoading()
				}
			})
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				},
				type: "POST",
				data: $('#formEditar').serialize(),
				url: "{{ url('/EjecutarSolicitud')}}",
				success: function(response){
					mensajeExito();
					console.log(response);
				}
				error: function(response){
					mensajeError();
					console.log(response);
				}
			});
		}
		function mensajeError()
		{
			swal({
				title: 'Error',
				text: "Error al editar",
				type: 'error',
				confirmButtonColor: '#f71c1c',
				confirmButtonText: "OK"
			});
		}
		
		function mensajeExito()
		{
			 swal({
				title: "Éxito!",
				text: "Edicion realizada con éxito",
				type: "success"
			})
		}
	</script>
		
		
@endsection