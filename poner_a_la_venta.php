<!DOCTYPE html>
<html>
	<head>
		<title>Comentario enviado</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>

<?php
$username=$_POST['username'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$img=$_POST['img'];
$precio=$_POST['precio'];
$categoria=$_POST['categoria'];
$descripcion=$_POST['descripcion'];

$precio=$_POST['precio'];
$productname=$_POST['productname'];

$fecha=date('r');
$numImg=0;

$productos=simplexml_load_file('productos.xml');
//TODO: guardar imagen
$ult_id = $productos['ult_id'];
$ult_id = $ult_id +1;
$productos['ult_id']=$ult_id;

$nuevo = $productos->addChild('producto');
$nuevo['id'] = $ult_id;
$nuevo['categoria'] = $categoria;

$nuevo->addChild('username',$username);
$nuevo->addChild('productname', $productname);

$nuevo->addChild('descripcion',$descripcion);
$nuevo->addChild('precio',$precio);
$nuevo->addChild('email',$correo);
$nuevo->addChild('telefono',$telefono);
$nuevo->addChild('fecha',$fecha);

$numImg=count($_FILES["archivo"]["name"]);

# definimos la carpeta destino
$carpetaDestino="imagenes/";

# si hay algun archivo que subir
if(isset($_FILES["archivo"]) && $_FILES["archivo"][0][0])
{
	$numImg=count($_FILES["archivo"]["name"]);
    # recorremos todos los arhivos que se han subido
    for($i=0;$i<$numImg;$i++)
    {

        # si es un formato de imagen
        if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
        {

            # si exsite la carpeta o se ha creado
            if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
            {
                $origen=$_FILES["archivo"]["tmp_name"][$i];
                $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];

                # movemos el archivo
                if(@move_uploaded_file($origen, $destino))
                {
                    echo "<br>".$_FILES["archivo"]["name"][$i]." movido correctamente";
                }else{
                    echo "<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i];
                }
            }else{
                echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
            }
        }else{
            echo "<br>".$_FILES["archivo"]["name"][$i]." - NO es imagen jpg, png o gif";
        }
    }
}else{
    echo "<br>No se ha subido ninguna imagen";
}

$nuevo->addChild('numImg',$numImg);

$productos->asXML('productos.xml');
?>

		<div class="title">
			<h1>El producto ya esta disponible en la tienda</h1>
			<a href="index.html">Haz click aqui para volver al inicio.</a>
		</div>
	</body>
</html>
