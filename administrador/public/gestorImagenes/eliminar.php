<?php
require('clases/Carpetas.class.php');

$id=$_GET['id'];
$nombre=$_GET['nombre'];
$objCliente=new x;
if( $objCliente->eliminar($id) == true){
	
	$carpeta = "../../../photos/".$nombre."/";
	
	if (($carpeta)!= ('') && ( is_dir ($carpeta ))){ 
	//función que elimina recursivamente todo el contenido de un directorio dado 
	function eliminar_recursivo_contenido_de_directorio( $carpeta ){ $directorio = opendir($carpeta); while ($archivo = readdir(							   		$directorio)){ if( $archivo !='.' && $archivo !='..' ){
		//comprobamos si es un directorio o un archivo 
		if ( is_dir( $carpeta.$archivo ) ){ 
		//si es un directorio, volvemos a llamar a la función para que elimine el contenido del mismo 
		eliminar_recursivo_contenido_de_directorio( $carpeta.$archivo.'/' ); rmdir($carpeta.$archivo); 
		//borrar el directorio cuando esté vacío 
		} else { 
		//si no es un directorio, lo borramos
		unlink($carpeta.$archivo); } } } closedir($directorio); } eliminar_recursivo_contenido_de_directorio ($carpeta); rmdir(         $carpeta); 
		?>
	 <script language="javascript" type="text/javascript">
	
		alert ("El Album de esta galeria ha sido borrado completamente del servidor")
		window.location='index.php'
	
	 </script>
	   <?
	  die(""); 
		}
		else { 
		
		 ?>
	 <script language="javascript" type="text/javascript">
	
		alert ("No existe el Album que desea borrar o no ha especificado un Album")
		window.location='index.php'
	
	 </script>
	   <?
		die("");
	 } 
	
}else{
	
	echo "Ocurrio un error";
}



?>
