function validar(formulario){

	var phone_num = formulario.telf;

	if()

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