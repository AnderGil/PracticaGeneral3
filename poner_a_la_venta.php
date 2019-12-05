<?php
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$img=$_POST['img'];
$precio=$_POST['precio'];
$categoria=$_POST['categoria'];
$descripcion=$_POST['descripcion'];
$numImg=1;//TODO:mirar cuantos archivos se han subido

$fecha=date('r');

$productos=simplexml_load_file('productos.xml');
//TODO: guardar imagen
$ult_id = $productos['ult_id'];
$ult_id = $ult_id +1;
$productos['ult_id']=$ult_id;

$nuevo = $productos->addChild('producto');
$nuevo->id = $ult_id;
$nuevo['categoria'] = $categoria;

$nuevo->addChild('nombre',$nombre);
$nuevo->addChild('descripcion',$descripcion);
$nuevo->addChild('precio',$precio);
$nuevo->addChild('email',$correo);
$nuevo->addChild('telefono',$telefono);
$nuevo->addChild('fecha',$fecha);
$nuevo->addChild('numImg',$numImg);

$productos->asXML('productos.xml');
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Comentario enviado</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
		<div class="title">
			<h1>El producto ya esta disponible en la tienda</h1>
			<a href="index.html">Haz click aqui para volver al inicio.</a>
		</div>
	</body>
</html>