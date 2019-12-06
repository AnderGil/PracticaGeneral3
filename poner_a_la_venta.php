<!DOCTYPE html>
<html>
	<head>
		<title>Comentario enviado</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>

	<body>
<?php
    $continue=False;
    if (isset($_POST['username'])  || isset($_POST['correo']) || isset($_POST['telefono']) || isset($_POST['precio']) || isset($_POST['categoria']) || isset($_POST['descripcion']) || isset($_POST['precio']) || isset($_POST['productname']) ){

        $username=$_POST['username'];
        $correo=$_POST['correo'];
        $telefono=$_POST['telefono'];
        $precio=$_POST['precio'];
        $categoria=$_POST['categoria'];
        $descripcion=$_POST['descripcion'];
        $precio=$_POST['precio'];
        $productname=$_POST['productname'];
        
        if (is_numeric($telefono) && $telefono>0 && is_numeric($precio) && strlen((string)$telefono) == 9 ){
            if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]){
                $elements = explode("@", $correo);
                if ( count($elements)==2 ){
                    if( strlen($elements[0])>2 && strlen($elements[1])>2 ){
                        $cServ = explode(".",$elements[1]);
                        if (count($cServ)>=2 ){
                            if( strlen($cServ[count($cServ)-1])>2 ){
                                $hasnum=False;
                                $continue=True;
                            }
                        }
                    }
                }
            }
        }
    }

    if ($continue){

        $fecha=date('r');
        $numImg=0;

        $productos=simplexml_load_file('productos.xml');

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

        # definimos la carpeta destino
        $carpetaDestino="images/";     

	    $numImg=count($_FILES["archivo"]["name"]);

        # recorremos todos los arhivos que se han subido
        for($i=0;$i<$numImg;$i++)
        {
            $oldname = $_FILES["archivo"]["name"][$i];
            # si es un formato de imagen
            if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
            {
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {	
                    
                	# cambiamos el nombre a productid+i
                	$_FILES["archivo"]["name"][$i]=$ult_id."+".$i;
                	
                    $origen=$_FILES["archivo"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
 
                    # movemos el archivo
                    if(!@move_uploaded_file($origen, $destino))
                    {                   
                        $numImg=-1;     
                        echo "<br> Error en el servidor con el archivo:".$oldname;
                    }
                }else{
                    $numImg=-1;
                    echo "<br> Debido a un problema en el servidor, no se han podido guardar las imágenes ";
                }
            }else{
                $numImg=-1;
                echo "<br>".$oldname." - NO es imagen jpg, png o gif. Por lo que ha sido rechazado por el servidor";
            }
        }
        $nuevo->addChild('numImg',$numImg);
        $productos->asXML('productos.xml');

        echo "<br> Información guardada.";

    }else{
        echo "<br> Los datos no estan completos, o no respetan las normas impuestas.";
    }
?>
		<div class="title">
            <?php
            if ($continue){
                echo "<h1>El producto ya está disponible en la tienda.</h1>";
            }
            echo '<a href="vender.html">Haz click aqui para volver a vender otro producto</a><br>';
            echo '<a href="index.html">Haz click aqui para volver al inicio.</a>';
            ?>
		</div>
	</body>
</html>
