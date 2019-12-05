
var lista_De_Archivos;

function manejarArchivos() {

  var fileInput = document.getElementById('archivos');
  var fileListDisplay = document.getElementById('file-list-display');
  
  var fileList = [];
  var renderFileList;

  lista_De_Archivos = [];
  
  fileInput.addEventListener('change', function (evnt) {
 		fileList = [];
 		lista_De_Archivos = [];
 		
  	for (var i = 0; i < fileInput.files.length; i++) {
  		fileList.push(fileInput.files[i]);
    	lista_De_Archivos.push(fileInput.files[i]);
    }
    
    renderFileList();
  });
  
  renderFileList = function () {
  	fileListDisplay.innerHTML = '';
  	
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

	var mensaje = document.getElementById('resultado');
	mensaje.innerHTML = '';

	//COMPRUEBA SI LOS CAMPOS ESTAN RELLENOS

	if(nombre.length == 0 || correo.length == 0 || tel.length == 0 ||
		 descripcion.length == 0 || precio == 0 || lista_De_Archivos.length == 0){

		mensaje.innerHTML = "No olvide rellenar los campos, todos son obligatorios y al menos se debe subir una imagen del producto.";
		alert("Condiciones no cumplidas.");
		return false;

	}
//	COMPRUEBA SI EL TELEFONO ES UN NUMERO
	if(isNaN(tel)){
		mensaje.innerHTML = "El número de teléfono es, en efecto, un número, debe de rellenar el campo con un número valido.";
		alert("Condiciones no cumplidas.");
		return false;
	}
//	COMPRUEBA QUE EL TELEFONO SEA UN NUMERO NATURAL
	buen_tel = tel.split(".");
	if(buen_tel.length == 2){
		mensaje.innerHTML = "No existen teléfonos decimales.";
		alert("Condiciones no cumplidas.");
		return false;
	}
	if(tel < 0) {
		mensaje.innerHTML = "No existen teléfonos negativos.";
		alert("Condiciones no cumplidas.");
		return false;
	}
//	alert("03");
	if(isNaN(precio)){
		mensaje.innerHTML = "El precio ha de ser un número.";
		alert("Condiciones no cumplidas.");
		return false;
	}
	//alert("04");
	var dinero = precio.split(".");
	if (dinero.length > 1){
		if(dinero[1].length > 2){
			mensaje.innerHTML = "Los euros solo usan 2 decimales.";
			alert("Condiciones no cumplidas.");
			return false;
		}
	}
	//alert("05");
	if(tel.length != 9){
		mensaje.innerHTML = "El número de teléfono ha de ser de 9 dígitos, sin usar prefijo.";
		alert("Condiciones no cumplidas.");
		return false;
	}
	//alert("06");
	var sin_arroba = correo.split("@");
	if(sin_arroba.length != 2){
		mensaje.innerHTML = "El correo ha de tener una única '@'";
		alert("Condiciones no cumplidas.");
		return false;
	} else {
		if(sin_arroba[0].length == 0 || sin_arroba[1].length == 0){
			mensaje.innerHTML = "El correo es incorrecto.";
			alert("Condiciones no cumplidas.");
			return false;
		} else {
			var sin_puntos = correo.split(".");
			var chars = sin_puntos[sin_puntos.length - 1]; //EN PRINCIPIO GUARDA EL NUMERO DE CARACTERES DESPUES DEL ULTIMO PUNTO
			if(chars.length < 2){
				mensaje.innerHTML = "El dominio del correo (parte que está después del último punto) debe de tener al menos 2 caracteres.";
				alert("Condiciones no cumplidas.");
				return false;
			} else {
				for (var i = 0; i < chars.length; i++){
					if(!isNaN(chars[i])){
						mensaje.innerHTML = "La parte final del correo no puede contener numeros, solo caracteres (por ejemplo: .com)";
						alert("Condiciones no cumplidas.");
						return false;
					}
				}
			}
		}
	}

	
	var archivo_concreto;
	
	for (var i = 0; i < lista_De_Archivos.length; i++){
		//alert(i);
		archivo_concreto = (lista_De_Archivos[i].name).split(".");
		//alert("HOLA");
		//alert("archivo_concreto.length");
		if(archivo_concreto.length > 1){
			//alert(archivo_concreto[archivo_concreto.length - 1]);
			if(archivo_concreto[archivo_concreto.length - 1] == "jpg"){
				null;
			} else if(archivo_concreto[archivo_concreto.length - 1] == "jpeg"){
				null;
			} else if(archivo_concreto[archivo_concreto.length - 1] == "png"){
				null;
			} else if(archivo_concreto[archivo_concreto.length - 1] == "gif"){
				null;
			} else if(archivo_concreto[archivo_concreto.length - 1] == "pjpeg"){
				null;
			} else if(archivo_concreto[archivo_concreto.length - 1] == "pjpg"){
				null;
			} else {
				mensaje.innerHTML = "Uno de los archivos no es una imagen, solo puedes subir imagenes (Formatos validos: .png, .jpg, .jpeg, .gif, .pjpg, .pjpeg).";
				return false;
			}
		}
	}

	if(document.getElementById("1").checked || document.getElementById("2").checked || document.getElementById("3").checked
	 || document.getElementById("4").checked || document.getElementById("5").checked){

		return true;

	} else {
	
		mensaje.innerHTML = "no se ha seleccionado ningun tipo de instrumento!";
		alert("Condiciones no cumplidas.");
		return false;

	}

}

function supportMultiple() {
    //do I support input type=file/multiple
    var el = document.createElement("input");

    return ("multiple" in el);
}

function init() {
	lista_De_Archivos = [];
    if(supportMultiple()) {
        document.querySelector("#multipleFileLabel").setAttribute("style","");
    }
}