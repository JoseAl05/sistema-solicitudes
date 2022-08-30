@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<section class="container mt-5 pt-5">	
		<ol class="breadcrumb">
			<li class="breadcrumb-item active"><a href="{{ route('solicitante')}}">Perfil</a></li>
			<li class="breadcrumb-item active"><a href="{{ route('Solicitud')}}"> Agregar Solicitud </a></li>
			<li class="breadcrumb-item active"><a href="{{ route('VerTabla')}}"> Ver Estados de Solicitud </a></li>
		</ol>
		<div class="container mt-4">
			<h4 class="tituloSolicitud">SOLICITUD DE COMPRA N° {{ $solicitud['id']}}</h4>
			<div class="formulario" style="width:70%; margin:50px;">
				<div class="mostrarFecha">
					<p align="right"><b>Fecha Envio:</b> {{ $solicitud->created_at->format('Y-m-d')}}</p>
				</div>
				<div class="mostrarUnidad">
					<p><b>Unidad Solicitante:</b>{{ $solicitud['UnidadSolicitante']}}</p>
				</div>
				<div class="mostrarNombreBienServicio">
					<p><b>Nombre Bien/Servicio:</b> {{ $solicitud['NombreBienServicio']}}</p>
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
											@foreach(json_decode($solicitud->DetalleBienServicio) as $detalle)
												{{$detalle}}
												<hr>
											@endforeach
										</td>
										<td>
											@foreach(json_decode($solicitud->UnidadDeMedida) as $unidad)
												{{$unidad}}
												<hr>
											@endforeach
										</td>
										<td>
											@foreach(json_decode($solicitud->CantidadRequerida) as $cantidad)
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
					<p><b>Justificacion:</b> <div class="casillaJustificacion"><p style="padding-left:5px">{{ $solicitud['JustificacionBienServicio']}}</p></p><br></div>
				</div>
				<div class="mostrarObservaciones">
					<p><b>Observaciones:</b><div class="casillaObservaciones"><p style="padding-left:5px">{{ $solicitud['Observaciones']}}</p></p><br></div>
				</div>
				<div class="mostrarFechaAprox">
					<p><b>Fecha aprox. para cuando se requiere:</b> {{ $solicitud['fechaAproximada']}}</p>
				</div>
				<div class="mostrarObservaciones">
					<p><b>Estado Solicitud:</b>{{ $solicitud['estadoSolicitud']}}</p></div>
				</div>
				@if($solicitud->estadoSolicitud == 'Rechazada')
					<div class="mostrarObs">
						<p><b>Observacion sobre Rechazo:</b>{{ $solicitud['ObservacionEstado']}}</p>
					</div>
				@endif
	</section>
@endsection