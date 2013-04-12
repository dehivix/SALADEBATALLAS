

function validarEmail(valor) {

if (/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/.test(valor)){
return regex.test(url);
alert("La dirección de email " + valor + " es correcta.");

} else {
alert("La dirección de email es incorrecta.");
document.ajax_form.email.focus();
return false;
}

}

function validar() { 

	


 	if (document.ajax_form.nombre.value.length==0) {
		alert("Por favor escriba su Nombre completo");
		document.ajax_form.nombre.focus();
		return false;
	 } 
	validarEmail(document.ajax_form.email.value);
	
	 if (document.ajax_form.asunto.value.length==0) {
		alert("Por favor escriba el Asunto");
		document.ajax_form.asunto.focus();
		return false;
	 }

 	if (document.ajax_form.mensaje.value.length==0) {
		alert("Por favor escriba su Mensaje.");
		document.ajax_form.mensaje.focus();
		return false;
	 }


 }

 




