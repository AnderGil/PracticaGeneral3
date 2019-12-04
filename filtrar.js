function filtrar(f){
	if(document.getElementById('viento').checked) {
		solicitar_filtro('viento');
	}else if(document.getElementById('percusion').checked) {
		solicitar_filtro('percusion');
	}else if(document.getElementById('cuerda').checked) {
		solicitar_filtro('cuerda');
	}else if(document.getElementById('electrico').checked) {
		solicitar_filtro('electrico');
	}else if(document.getElementById('complementos').checked) {
		solicitar_filtro('complementos');
	}else{
		solicitar_filtro('todos');
	}
}

function solicitar_filtro(categoria){
	var xhr;
	if(XMLHttpRequest)
		xhr = new XMLHttpRequest();
	else
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	// Establecer el método (GET), la URL (script PHP y parámetro) y
	//  si la solicitud es asíncrona (true)
	xhr.open('GET', 'filtrar.php?categoria='+categoria, true);
	// Establecer rutina de atención (handler)
	xhr.onreadystatechange = function()
	{
		// Si la respuesta ha sido correcta
		if(xhr.readyState == 4 && xhr.status == 200)
			// Asignar el texto del comentario completo enviado
			//  por el servidor al elemento correspondiente de la lista
			document.getElementById("productos").innerHTML = xhr.responseText;
	}
	// Enviar la solicitud AJAX
	xhr.send('');
}