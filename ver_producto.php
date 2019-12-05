<?php
$id=$_POST['product_id'];

$productos=simplexml_load_file('productos.xml');

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
						echo('<h1>Detalles del producto:</h1><br>');
						echo('</div>');
						echo('<span class="producto">'.$producto->productname.'</span><br>');
						echo('<img src="'.$producto->foto.'" alt="Foto del producto"><br>');
						echo('<span class="descripcion">'.$producto->descripcion.'</span><br>');
						echo('<span class="precio"> precio :'.$producto->precio.' €</span><hr>');
						echo('<p> Nombre del vendedor del producto: '.$producto->username.'</p>');
						echo('<p> Telefono del vendedor: '.$producto->telefono.'</p>');
						echo('<p> Correco electrónico del vendedor: '.$producto->email.'</p>');
						echo('<p> Si está interesado en este producto, por favor póngase en contacto con el vendedor de éste.<p><hr>');
					}
				}
			?>
			<a href="comprar.php">Haz click aqui para volver a la lista de productos.</a>
		</div>
	</body>
</html>