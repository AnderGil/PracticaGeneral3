<?php	
	if(isset($_GET['categoria']))
	{
		$categoriaFiltrada=$_GET['categoria'];
		// Cargar el fichero XML con la lista de comentarios
		$productos=simplexml_load_file('productos.xml');

		$direccion="images/";

		$cont=0;
		// Recorrer la lista de comentarios hasta encontrar el del 'id' dado
		foreach($productos->producto as $producto)
		{
			if($producto['categoria'] == $categoriaFiltrada or $categoriaFiltrada=="todos")
			{
				$cont++;
				echo('<p>A continuación se listan los productos:</p>');
				echo('<span class="producto">'.$producto->productname.'</span><br>');
				echo('<img src="'.$direccion.$producto['id'].'+0" alt="Foto del producto"><br>');
				echo('<span class="precio"> precio: '.$producto->precio.' €</span>');
				echo('<form action="ver_producto.php" method="post">');
				echo('<input type="hidden" name="product_id" value="'.$producto['id'].'">');
				echo('<input id="boton_ver_mas" type="submit" name="Ver_mas" value="Ver más">');
				echo('</form>');
				echo('<hr>');
			}
		}

		if ($cont==0)
		{
			echo('<p> No hay productos de esta categoría. </p>');
		}
	}
?>