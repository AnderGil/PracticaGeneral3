<!DOCTYPE html>
<html>
	<head>
		<title>Wallapop</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="estilo.css" type="text/css">
		<script type="text/javascript" src="filtrar.js"></script>

	</head>
	<body>
		<div class="p1">
			<h1>Wallapop</h1>
				<p>
					A continuación se listan los productos:
				</p>
		</div>
		<?php
			$productos=simplexml_load_file('productos.xml');
			foreach($productos->producto as $producto){
				echo('<span class="producto">'.$producto->nombre.'</span>');
				echo('<img src="'.$producto->foto.'" alt="Foto del producto">');
				echo('<span class="precio">'.$producto->precio.'</span>');
			}
		?>
		<div class="filtro">
			<aside>
				<form>
					<p>Para buscar un tipo concreto de producto:</p>
					<input type="radio" name="categoria" id="viento" value="viento" > Instrumentos de viento<br>
					<input type="radio" name="categoria" id="percusion" value="percusion" > Instrumentos de percusion<br>
					<input type="radio" name="categoria" id="cuerda" value="cuerda" > Instrumentos de cuerda<br>
					<input type="radio" name="categoria" id="electrico" value="electrico" > Instrumentos eléctricos<br>
					<input type="radio" name="categoria" id="complementos" value="complementos" > Complementos de instrumentos<br>
					<input type="radio" name="categoria" id="todos" value="todos" > Ver todos los productos<br>

					<!--El botón de abajo precisa ser del tipo submit para poder enviar el formulario de forma adecuada al servidor. -->
					<input id="boton" type="button" name="filtrar" value="Filtrar" onclick="return filtrar(this.form)">
				</form>
			</aside>
		</div>
	</body>
</html>