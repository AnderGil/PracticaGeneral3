<?php
$id=$_POST['product_id'];

$productos=simplexml_load_file('productos.xml');
$direccion="images/";

?>


<!DOCTYPE html>
<html>
	<head>
		<title>WallaPop musical</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
		<div class="title">
			<?php
				foreach($productos->producto as $producto)
				{
					if($producto['id'] == $id)
					{	
						echo('<h1 class="filtro">Detalles del producto:</h1><br>');
						echo('</div>');
						echo('<div class="productos">');
						echo('<span clas="producto" style="font-size:200%">'.$producto->productname.'</span><br>');
						if($producto->numImg==-1){
							echo('<img class="imagen" src="'.$direccion.'default" alt="Foto del producto"><br>');
						}else{				
							for($i=0; $i < $producto->numImg; $i++)
							{
								echo('<img class="imagen" src="'.$direccion.$producto['id']."+".$i.'" alt="Foto del producto"><br>');
							}
						}
						echo('<span class="descripcion">'.$producto->descripcion.'</span><br>');
						echo('<span class="precio"> precio: '.$producto->precio.' €</span><hr>');
						echo('<p> Nombre del vendedor del producto: '.$producto->username.'</p>');
						echo('<p> Telefono del vendedor: '.$producto->telefono.'</p>');
						echo('<p> Correo electrónico del vendedor: '.$producto->email.'</p>');
						echo('<p> Si está interesado en este producto, por favor póngase en contacto con el vendedor de éste.<p><hr>');
						echo('<div class = "productos">');
					}
				}
			?>
			<a id="volver" href="comprar.php">Haz click aqui para volver a la lista de productos.</a>
		</div>
	</body>
</html>