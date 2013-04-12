<?php
require('clases/noticia.class.php');

$id=$_GET['id'];
$objCliente=new Noticia;
if( $objCliente->eliminar($id) == true){
	echo "Registro eliminado correctamente";
}else{
	echo "Ocurrio un error";
}
?>