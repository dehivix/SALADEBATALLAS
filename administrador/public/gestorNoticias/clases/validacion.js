// JavaScript Document
<!--

function inhabilitar(){

   
    return false
}
document.oncontextmenu=inhabilitar

// -->
window.addEvent('domready', function() {
    Sexy = new SexyAlertBox();
});


function formulario()
{

//valida las noticias
var tipo_noticia=0;
for(i=0; ele=document.uploadform.elements[i]; i++){
if (ele.type=='radio')
if (ele.checked){tipo_noticia=1;break;}}
if (tipo_noticia==1){document.uploadform.submit();
}else{
 alert("Debes seleccionar el tipo de noticia!");
 return false;}

//valido el campo titulo
if (document.uploadform.titulo.value.length==0){
   alert("Insertar el tema!");
   document.uploadform.titulo.focus();
   return false;
}

//validando q se envie la bendita imagen
if (document.uploadform.foto.value.length==0){
   alert("Inserta una imagen!");
    document.uploadform.foto.valueOf();
    return false;
}
//document.frmRegistro.submit();
alert("Procesando datos!");
    document.uploadform.submit();
}






