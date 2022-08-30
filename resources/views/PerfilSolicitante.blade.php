@extends('layouts.app')

@section('content')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<section class="container mt-5 pt-5">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header" align="center">Perfil de {{Auth::user()->name}}</h1>
				<h4 class="page-header" align="center"><em>{{Auth::user()->email}}</em></h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Perfil</li>
					<li class="breadcrumb-item active"><a href="{{ route('Solicitud')}}"> Agregar Solicitud </a></li>
					<li class="breadcrumb-item active"><a href="{{ route('VerTabla')}}"> Ver Estados de Solicitud </a></li>
				</ol>
			</div>
		</div>
	</section>
@endsection