
var lista_De_Archivos = [];

//https://medium.com/typecode/a-strategy-for-handling-multiple-file-uploads-using-javascript-eb00a77e15f
function manejarArchivos() {

  var fileInput = document.getElementById('archivos');
  var fileListDisplay = document.getElementById('file-list-display');
  
  var fileList = [];
  var renderFileList;

  lista_De_Archivos = [];
  
  fileInput.addEventListener('change', function (evnt) {
 		fileList = [];
 		//alert("AUN NO HA ENTRADO...");
  	for (var i = 0; i < fileInput.files.length; i++) {
  		//alert("PASA");
  		//alert("Archivo " + i + " :" + fileInput.files[i]);
    	fileList.push(fileInput.files[i]);
    	lista_De_Archivos.push(fileInput.files[i]);
    }
    alert(lista_De_Archivos.length);
    renderFileList();
  });
  
  renderFileList = function () {
  	fileListDisplay.innerHTML = '';
  	//var index = 0;
    fileList.forEach(function (file, index) {
    	var fileDisplayEl = document.createElement('p');
      fileDisplayEl.innerHTML = (index + 1) + ': ' + file.name;
      fileListDisplay.appendChild(fileDisplayEl);
    });
  }
}

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
	   		alert("lista_De_Archivos.length");
	   		for (var i = 0; i < lista_De_Archivos.length; i++){
	   			var archivo_concreto = lista_De_Archivos[i].split(".");
	   			alert(archivo_concreto[archivo_concreto.length - 1]);
	   			if(archivo_concreto[archivo_concreto.length - 1] == ".jpg"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".jpeg"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".png"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".gif"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".tiff"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".tif"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".bmp"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".psd"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".pdf"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".eps"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".pic"){
	   				null;
	   			} else if(archivo_concreto[archivo_concreto.length - 1] == ".RAW"){
	   				null;
	   			} else {
	   				alert("Uno de los archivos no es una imagen, solo puedes subir imagenes (Formatos usuales: .png, .jpg, .jpeg, ...).");
	   				return false;
	   			}
	   		}

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