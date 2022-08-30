$(document).ready( function(){
	$("form[id='formSolicitud']").submit(function (e) {
      e.preventDefault();
	  enviarSolicitud(e);
  });
});


function enviarSolicitud(e){
	swal.fire({
		title: '¿Estas Seguro?',
		text: 'Agregar nueva solicitud',
		type: 'question',
		showCancelButton: true,
		allowOutsideClick: false,
		allowEscapeKey: false,
		allowEnterKey: false,
		confirmButtonColor: '#01ff04',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si',
		cancelButtonText: 'No'
		}).then((result) => {
			if(result.value)
			{
				swal.fire({
					title: 'Espera un Momento!',
					text: 'Trabajando su Solicitud'
					allowOutsideClick: false,
					allowEscapeKey: false,
					allowEnterKey: false,
					onOpen: () => {
						swal.showLoading()
					}
				})
				$.ajax({
					type: "POST",
					url: e,
					data: $('#formSolicitud').serialize(),
					error:function(){
						mensajeError();
					},
					success:function(recivingData){
						procesarData(recivingData);
					}
				});
			}
		})
	}
	
function procesarData(recivingData) 
{
	var data = JSON.parse(recivingData);
	console.log(data['estado']);
	if(data['estado'] != -1)
	{
		mensajeExito(data['mensaje']);
	}else if(data['estado'] == -1) {
		mensajeErrorMensaje(data['mensaje']);
	}
}

function mensajeExito(mensaje)
{
	swal.fire({
		title: "Éxito!",
		text: mensaje,
		type: "success"
	}).then(function () {
		window.location.reload();
	});
}

function mensajeErrorMensaje(mensaje) {
	swal.fire({
		title: 'Error',
		text: mensaje,
		type: 'error',
		confirmButtonColor: '#f71c1c',
		confirmButtonText: "OK"
	});
}

function mensajeError() {
	swal.fire({
		title: 'Error',
		text: "Existe un problema, contacte al soporte técnico",
		type: 'error',
		confirmButtonColor: '#f71c1c',
		confirmButtonText: "OK :("
	});
}

					