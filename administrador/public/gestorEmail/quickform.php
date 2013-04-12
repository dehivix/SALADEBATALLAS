<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
// Carga el modulo requerido
require 'HTML/quickform.php';
// Instancia un nuevo formulario
$form = new HTML_QuickForm('cliente');
// Agrega una caja de texto
$form->addElement('text','nombre_c','Nombre Cliente:');
// Agrega una caja de texto
//$form->addElement('text','codigo_c','Codigo Cliente:');

//para que el codigo sea oculto
$form->addElement('password','codigo_c','Codigo Cliente:');

//para correos electronicos
$form->addElement("textarea","email","e-mail");

// Agrega un boton de envio
$form->addElement('submit','enviar','Enviar');

//registrando regla con espacio en blanco
$form->addRule('solo_letras','regex','/[a-z:A-Z:[:space:]]$/');

// Añade laS reglas de validacion
$form->addRule('nombre_c','Por favor ingrese un nombre de cliente','required');
$form->addRule('codigo_c','Por favor ingrese un codigo de cliente','required');
$form->addRule('nombre_c','El campo debe contener solo texto','solo numero');
$form->addRule('codigo_c','solo debe contener numeros','numeric');
$form->addRule('email','no es un email valido','email');

// llamada de procedimiento cuando el formulario es validado
// si los datos estan validados; de lo contrario, muestra de nuevo el formulario
if ($form->validate()) {
$form->process('procesar_cliente');
} else {
$form->display();
}
// Define a function to process the form data
function procesar_cliente($cliente) {
echo "El  es cliente: ".$cliente['nombre_c'];
echo "<br> Tiene el codigo: ".$cliente['codigo_c'];
echo "<br> El email".$cliente["email"];
} 
 
?> 

</body>
</html>
 
