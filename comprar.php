<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Wallapop</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="estilo.css" type="text/css">
		<script type="text/javascript" src="filtrar.js"></script>

	</head>
	<body>
		<div class="titulo">
			<h1>Wallapoop musical</h1>
		</div>
		<div class="filtro">
			<a class="volver" href="index.html">Haz click aqui para volver a la página de inicio.</a>

			<div class="filtro_texto">
				<form>
					<p>Para buscar un tipo concreto de producto:</p>
					<input type="radio" name="categoria" id="viento" value="viento" > Instrumentos de viento<br>
					<input type="radio" name="categoria" id="percusion" value="percusion" > Instrumentos de percusion<br>
					<input type="radio" name="categoria" id="cuerda" value="cuerda" > Instrumentos de cuerda<br>
					<input type="radio" name="categoria" id="electrico" value="electrico" > Instrumentos eléctricos<br>
					<input type="radio" name="categoria" id="complementos" value="complementos" > Complementos de instrumentos<br>
					<input type="radio" name="categoria" id="todos" value="todos" > Ver todos los productos<br>

					<!--El botón de abajo precisa ser del tipo submit para poder enviar el formulario de forma adecuada al servidor. -->
					<a href="javascript:filtrar(this.form)">
						<input class="boton" type="button" name="filtrar" value="Filtrar">
					</a>
				</form>
			</div>
		</div>

		<div id="productos">
			<p>
				A continuación se listan los productos:
			</p>
			<?php
				$direccion="images/";
				$productos=simplexml_load_file('productos.xml');
				foreach($productos->producto as $producto){
					echo('<span class="producto">'.$producto->productname.'</span><br>');
					if($producto->numImg==-1){
						echo('<img class="imagen" src="'.$direccion.'default" alt="Foto del producto"><br>');
					}else{
						echo('<img class="imagen" src="'.$direccion.$producto['id'].'+0" alt="Foto del producto"><br>');
					}
					echo('<span class="precio"> Precio: '.$producto->precio.' €</span>');
					echo('<form action="ver_producto.php" method="post">');
					echo('<input type="hidden" name="product_id" value="'.$producto['id'].'">');
					echo('<input class="boton" type="submit" name="Ver_mas" value="Ver más">');
					echo('</form>');
					echo('<hr>');
				}
			?>
		</div>
	</body>
</html>