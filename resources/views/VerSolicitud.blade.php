@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<section class="container mt-5 pt-5">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a href="{{ route('autorizador')}}">Perfil</a></li>
					<li class="breadcrumb-item active"><a href="{{ route('autorizadorTabla')}}"> Ver Solicitudes </a></li>
				</ol>
			</div>
		</div>
		<div class="container mt-4">
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
					<p><b>Estado Solicitud:</b>{{ $mostrarSolicitud['estadoSolicitud']}}</p>
					<p><b>Obs:</b>{{ $mostrarSolicitud['ObservacionEstado']}}</p>
				</div>
		</div>
	</section>
@endsection