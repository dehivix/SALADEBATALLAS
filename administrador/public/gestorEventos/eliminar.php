<?php
require('clases/evento.class.php');

$id=$_GET['id'];
$objCliente=new Evento;
if( $objCliente->eliminar($id) == true){
	echo "Registro eliminado correctamente";
}else{
	echo "Ocurrio un error";
}
?>