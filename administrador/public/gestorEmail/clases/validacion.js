function ValidaURL(url) { 
var regex=/^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,4}|travel)(:\d{2,5})?(\/.*)?$/i 
return regex.test(url);
 }

 //Validar del campo de formulario de URL 

function validar(f) { 
	if(!ValidaURL(f.txturl.value) ){
	 	alert("La direccion URL es incorrecta"); 
		f.txturl.focus();
		return (false); 
	}

	if (f.titulo.value.length==0){
   		alert("Insertar el Titulo del Viedo!");
   		f.titulo.focus();
   		return false;
	}

 }

