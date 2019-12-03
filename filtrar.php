<?php	
	if(isset($_GET['categoria'])
	{
		$categoriaFiltrada=$_GET['productos.xml'];
		// Cargar el fichero XML con la lista de comentarios
		$productos=simplexml_load_file($CMT_FILE);
		// Recorrer la lista de comentarios hasta encontrar el del 'id' dado
		foreach($productos->producto as $producto)
		{
			if($producto[categoria] == $categoriaFiltrada or $categoriaFiltrada=="todos")
			{
				echo('<span class="producto">'.$producto->nombre.'</span><br>');
				echo('<img src="'.$producto->foto.'" alt="Foto del producto"><br>');
				echo('<span class="precio">'.$producto->precio.'</span>');
				echo('<hr>');
			}
		}
	}
?>