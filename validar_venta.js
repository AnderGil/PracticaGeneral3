function validar(formulario){

	var nombre = formulario.nombre.value;
	var correo = formulario.correo.value;
	var tel = formulario.telefono.value;
	var precio = formulario.precio.value;
	var descripcion = formulario.descripcion.value;

	if(nombre.length == 0 || correo.length == 0 || tel.length == 0 || descripcion.length == 0 || precio == 0){

		alert("No olvide rellenar los campos, todos son obligatorios y al menos se debe subir una imagen del producto.");
		return false;

	} else {

		if(isNaN(tel)){
			alert("El número de teléfono es, en efecto, un número, debe de rellenar el campo con un número valido.");
			return false;
		}
		buen_tel = tel.split(".");
		if(buen_tel.length == 2){
			alert("El número de teléfono es incorrecto.");
			return false;
		}

		if(isNaN(precio)){
			alert("El precio ha de ser un número.");
			return false;
		}
		var dinero = precio.split(".");
		if(dinero[1].length > 2){
			alert("Los euros solo usan 2 decimales.");
			return false;
		}

		if(tel.length != 9){
			alert("El número de teléfono ha de ser de 9 dígitos, sin usar prefijo.");
			return false;
		}

		var sin_arroba = correo.split("@");
		if(sin_arroba.length != 2){
			alert("El correo ha de tener una única '@'");
			return false;
		} else {
			if(sin_arroba[0].length == 0 || sin_arroba[1].length == 0){
				alert("El correo es incorrecto.");
				return false;
			} else {
				var sin_puntos = correo.split(".");
				var num_chars = sin_puntos[sin_puntos.length - 1].length; //EN PRINCIPIO GUARDA EL NUMERO DE CARACTERES DESPUES DEL ULTIMO PUNTO
				if(num_chars < 2){
					alert("El dominio del correo (parte que está después del último punto) debe de tener al menos 2 caracteres.");
					return false;
				}
			}
		}

		if(document.getElementById("archivos").value != "") {
	   		// you have a file

	   		if(document.getElementById("1").checked || document.getElementById("2").checked || document.getElementById("3").checked
	   		 || document.getElementById("4").checked || document.getElementById("5").checked){

	   			alert("Todo OK...");
	   			return true;

	   		} else {
				
	   			alert("no se ha seleccionado ningun tipo de instrumento!");
	   			return false;

	   		}

		} else {

			alert("NO HAY ARCHIVO");
			return false;

		}	

	}

}




function supportMultiple() {
    //do I support input type=file/multiple
    var el = document.createElement("input");

    return ("multiple" in el);
}

function init() {
    if(supportMultiple()) {
        document.querySelector("#multipleFileLabel").setAttribute("style","");
    }
}