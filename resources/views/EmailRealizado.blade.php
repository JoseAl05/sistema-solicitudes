<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Estado Solicitud de Compra</title>
</head>
<body>
    <p>Hola! Se ha realizado la compra de su solicitud N° {{$params->id}} emitida el {{$params->created_at->format('d-m-Y')}}.</p>
	<a href=" {{ route('home')}}">Por favor ingrese al sistema para confirmar.</a>
	<br>
	<br>
	<p>NO ES NECSARIO QUE RESPONDA ESTE CORREO!</p>
</body>
</html>