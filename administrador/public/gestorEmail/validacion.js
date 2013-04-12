

function validarEmail(valor) {

if (/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/.test(valor)){
return regex.test(url);
alert("La dirección de email " + valor + " es correcta.");

} else {

alert("La dirección de email es incorrecta.");
document.contacto.email.focus();
return false;
}

}




function validar() { 

	validarEmail(document.contacto.email.value);


 	if (document.contacto.nombre.value.length==0) {
		alert("Por favor escriba su Nombre completo");
		document.contacto.name.focus();
		return false;
	 } 

	 if (document.contacto.email.value.length==0) {
		alert("Por favor escriba su direcci\xF3n de correo electr\xF3nico");
		document.contacto.email.focus();
		return false;
	 }

	 if (document.contacto.asunto.value.length==0) {
		alert("Por favor escriba el Asunto");
		document.contacto.subject.focus();
		return false;
	 }

 	if (document.contacto.mensaje.value.length==0) {
		alert("Por favor escriba su Mensaje.");
		document.contacto.message.focus();
		return false;
	 }


 }

 




