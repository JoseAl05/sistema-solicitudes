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
		<h3 class="text-uppercase text-center">MODIFICAR DATOS DE {{$nombre}}</h3>
		<div class="container">
		<div class="alert alert-success" style="display:none"></div>
			<form method="post" action="{{ route('editarUsuario',$usuario->id) }}" id="formUsuario">
			{{csrf_field()}}
				{{method_field('PATCH')}}
					<div class="form-group row">
						<label for="rol" class="col-sm-2 form-control-label">Rol: </label>
						<div class="selectTipo">
							<select name="type" class="custom-select" id="type">
								<option value="solicitante" class="form-control">Solicitante</option>
								<option value="autorizador" class="form-control" selected>Autorizador</option>
								<option value="admin" class="form-control">Administrador</option>
							</select>
						</div>
					</div>
				<button class="btn btn-primary" type="submit" id="botonAgregar">Modificar Usuario</button>
				<a class="btn btn-primary" href="{{ route('mostrarUsuarios')}}" role="button"> Volver </a>
				<a class="btn btn-primary" href="{{ route('administrador')}}" role="button"> Volver al Perfil </a>
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
		function editarUsuario()
		{
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				},
				type: "POST",
				data: $('#formUsuario').serialize(),
				url: "{{ url('/ModificarUsuario')}}",
				success: function(response){
					if(response =! 1)
					{
						console.log(response);
					}
					else
					{
						window.location.href = "{{ url('/PerfilAdministrador')}};
					}
				}
			});
		}
				
	</script>
	
@endsection