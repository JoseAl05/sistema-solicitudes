@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
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
	<section class="container mt-5 pt-5">		
		<div class="container mt-4">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="{{ route('administrador')}}">Perfil</a></li>
				<li class="breadcrumb-item active"><a href="{{ route('mostrarUsuarios', Auth::user())}}"> Usuarios Registrados </a></li>
				<li class="breadcrumb-item active"><a href="{{ route('administradorTabla')}}"> Ver Solicitudes </a></li>
				<li class="breadcrumb-item active"><a href="{{ route('reportes')}}">Ver Registros del Sistema</a></li>
			</ol>
			<h4 class="tituloSolicitud">SOLICITUD DE COMPRA N° {{ $mostrarSolicitud['id']}}</h4>
			<div class="formulario" style="width:70%; margin:50px;">
				<div class="mostrarFecha">
					<p align="right"><b>Fecha Envio:</b> {{ $mostrarSolicitud->created_at->format('Y-m-d')}}</p>
				</div>
				<div class="mostrarUnidad">
					<p><b>Unidad Solicitante:</b>{{ $mostrarSolicitud['UnidadSolicitante']}}</p>
				</div>
				<div class="mostrarNombreBienServicio">
					<p><b>Nombre Bien/Servicio:</b> {{ $mostrarSolicitud['NombreBienServicio']}}</p>
				</div>
				<div class="mostrarDescripcionBienServicio">
					<p><b>Descripcion Bien/Servicio: </b></p>
				</div>
				<div class="tabla">
					<div class="container">
						<div class="tablaMostrar">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Detalle del Bien/Servicio</th>
										<th>Unidad de Medida</th>
										<th>Cantidad Requerida</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											@foreach(json_decode($mostrarSolicitud->DetalleBienServicio) as $detalle)
												{{$detalle}}
												<hr>
											@endforeach
										</td>
										<td>
											@foreach(json_decode($mostrarSolicitud->UnidadDeMedida) as $unidad)
												{{$unidad}}
												<hr>
											@endforeach
										</td>
										<td>
											@foreach(json_decode($mostrarSolicitud->CantidadRequerida) as $cantidad)
												{{$cantidad}}
												<hr>
											@endforeach
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="mostrarJustificacion">
					<p><b>Justificacion:</b> <div class="casillaJustificacion"><p style="padding-left:5px">{{ $mostrarSolicitud['JustificacionBienServicio']}}</p></p></div>
				</div>
				<div class="mostrarObservaciones">
					<p><b>Observaciones:</b><div class="casillaObservaciones"><p style="padding-left:5px">{{ $mostrarSolicitud['Observaciones']}}</p></p></div>
				</div>
				<div class="mostrarFechaAprox">
					<p><b>Fecha aprox. para cuando se requiere:</b> {{ $mostrarSolicitud['fechaAproximada']}}</p>
				</div>
				<div class="mostrarObservaciones">
					<p><b>Estado Solicitud:</b>{{ $mostrarSolicitud['estadoSolicitud']}}</p></div>
				</div>
				@if($mostrarSolicitud->estadoSolicitud == 'Rechazada')
					<div class="mostrarObs">
						<p><b>Observacion sobre Rechazo:</b>{{ $mostrarSolicitud['ObservacionEstado']}}</p>
					</div>
				@endif
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
		function editarEstado($id)
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
				data: $('#formEstado').serialize(),
				url: "{{ url('/EjecutarSolicitud/$id')}}",
				success: function(response){
					if(response =! 1)
					{
						console.log(response);
					}
					else
					{
						window.location.href = "{{ url('/PerfilAutorizador')}}";
					}
				}
			});
		}
	</script>
@endsection