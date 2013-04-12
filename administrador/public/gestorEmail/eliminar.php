<?php
require('clases/email.class.php');

$id=$_GET['id'];
$objCliente=new Email;
if( $objCliente->eliminar($id) == true){
  		echo('Gracias. Su Mensaje fue Eliminado Correctamente.');
	
}else{
	echo "Ocurrio un error";
}
?>