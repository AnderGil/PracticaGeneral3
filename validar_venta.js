function validar(formulario){

	var nombre = formulario.nombre.value;
	var correo = formulario.correo.value;
	var tel = formulario.telefono.value;
	var precio = formulario.precio.value;
	var descripcion = formulario.descripcion.value;

	if(nombre.length == 0 || correo.length == 0 || tel.length == 0 || descripcion.length == 0 || precio == 0){

		alert("No olvide rellenar los datos obligatorios, estos aparecen marcados al final con '*'.");
		return false;

	} else {

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