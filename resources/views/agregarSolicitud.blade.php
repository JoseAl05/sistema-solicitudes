@extends('layouts.app')

@section('content')
<head>
	<meta name="_token" content="{{csrf_token()}}" />
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" href="sweetalert2.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@include('sweet::alert')
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
</head>
	<section class="container mt-5 pt-5">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a href="{{ route('solicitante')}}">Perfil</a></li>
					<li class="breadcrumb-item active" aria-current="page"> Agregar Solicitud</li>
					<li class="breadcrumb-item active"><a href="{{ route('VerTabla')}}"> Ver Estados de Solicitud </a></li>
				</ol>
			</div>
		</div>
		<h4 class="tituloSolicitud">SOLICITUD DE REQUERIMIENTO DEL BIEN O SERVICIO</h4>
		<div class="col col-lg-3">
			<div class="card-body">
				<div class="container mt-4">
					<div class="alert alert-success" style="display:none"></div>
					 <form id="formSolicitud" name="formSolicitud" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="formulario">
							<div class="form-group">
								<div class="labelUnidad">
									<label for="unidad">Unidad Solicitante: </label>
								</div>
								<div class="unidad">
									<input type="text" class="form-control" id="unidad" placeHolder="Ingrese unidad solicitante....." name="unidad" required>
								</div>
								<div class="labelBien">
									<label for="unidad">Nombre Bien/Servicio: </label>
								</div>
								<div class="nombreBien">
									<input type="text" class="form-control" id="nombre" placeHolder="Ingrese nombre del bien o servicio....." name="nombre" required>
								</div>
								<div class="labelDescripcionBienServicio">
									<label>Descripcion Bien/Servicio: </label>
								</div>
								<div class="tablaAgregar">
									<table class="table table-bordered">
										<thead>
											<tr>
											  <th scope="col">Detalle del Bien/Servicio</th>
											  <th scope="col">Unidad de Medida</th>
											  <th scope="col">Cantidad Requerida</th>
											</tr>
													<td scope="row">
														<div class="columna1">
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" required>
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" >
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" >
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" >
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" >
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" >
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" >
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" >
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" >
															<input id="detalle" placeHolder="Ingrese Detalle del Bien/Servicio....." name="detalle[]" type="textField" class="form-control input-md" >
														</div>
													</td>
													<td>
														<div class="columna2">
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
															<input id="unidadMedida" placeHolder="Unidad" name="unidadMedida[]" type="text" class="form-control input-md" >
														</div>
													</td>
													<td>
														<div class="columna3">
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" required>
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" >
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" >
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" >
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" >
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" >
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" >
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" >
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" >
															<input id="cantidad" placeHolder="Cantidad" name="cantidad[]" type="text" class="form-control input-md" >
														</div>
													</td>
													
										</thead>
									</table>
								</div>
								<div class="labelJustificacion">
									<label for="justificacion">Justificacion Bien/Servicio: </label>
								</div>
								<div class="justificacion">
									<input type="text" class="form-control" id="justificacion" placeHolder="Ingrese Justificacion del Bien o Servicio....." name="justificacion" required>
								</div>
								<div class="labelObservaciones">
									<label for="observaciones">Observaciones: </label>
								</div>
								<div class="observaciones">
									<input type="text" class="form-control" id="observaciones" placeHolder="Ingrese Observacion. Si no tiene ninguna Observacion ingrese 'Sin Observacion'....." name="observaciones" required>
								</div>
								<div class="labelFechaAprox">
									<label for="fechaAprox">Fecha aprox. para cuando se requiere: </label>
								</div>
								<div class="fechaAprox">
									<input type="date" class="form-control" id="fechaAprox" placeholder="dd/mm/yyyy" name="fechaAprox" required>
								</div>
							</div>
						</div>
						<button class="btn btn-primary" id="botonEnviar" onclick="agregarSolicitud()" onsubmit="checkSubmit()">Enviar Solicitud</button>
					</form>
					</div>
				</div>
			</div>
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
		function agregarSolicitud()
		{
			swal({
				title: 'Espera un momento!',
				text: 'Trabajando tu solicitud..',
				allowOutsideClick: false,
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
				data: $('#formSolicitud').serialize(),
				url: "{{ url('/Solicitud')}}",
				success: function(response){
					if(response =! 1)
					{
						mensajeExito();
						console.log(response);
					}
					else
					{
						mensajeError();
						window.location.href = "{{ url('/PerfilSolicitante')}}";
					}
				}
			});
		}
		var statSend = false;
		function checkSubmit() 
		{
			if (!statSend) 
			{
				statSend = true;
				return true;
			}
			else
			{
				console.log(response);
				return false;
			}
		}
		function mensajeExito()
		{
			swal({
				title: "Éxito!",
				text: "Edicion realizada con éxito",
				type: "success"
			})
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
		function check_text(input) 
		{  
			if (input.validity.patternMismatch)
			{  
				input.setCustomValidity("Formato URL: https://www.google.cl/");  
			}  
			else 
			{  
				input.setCustomValidity("");  
			}   
		}
	}
	</script>
@endsection