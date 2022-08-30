<!doctype html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Estado Solicitud de Compra</title>
</head>
<body>
    <p>Hola! Su solicitud de compra N¢X {{$params->id}} emitida el {{$params->created_at->format('d-m-Y')}} fue anulada .</p>
	<a href=" {{ route('home')}}">Por favor ingrese al sistema para confirmar.</a>
	<br>
	<br>
	<p>NO ES NECSARIO QUE RESPONDA ESTE CORREO!</p>
</body>
</html>