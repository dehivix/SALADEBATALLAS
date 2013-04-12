<?php
require('clases/email.class.php');

$id=$_GET['id'];
$objCliente=new Email;
$consulta=$objCliente->muestro_datos($id);
if( $consulta == true){
	while( $email = mysql_fetch_array($consulta) ){
		?>
        	<table>
			  <tr><td><b>Nombre: </b></td><td><?php echo $email['nombre'] ?></td></tr>
			  <tr><td><b>Email: </b></td><td><?php echo $email['email'] ?></td></tr>
              <tr><td><b>Asunto: </b></td><td><?php echo $email['asunto'] ?></td></tr>
			  <tr><td><b>Mensaje: </b></td><td><?php echo $email['mensaje'] ?></td></tr>
              <tr><td><span><a style="text-decoration: none;"href="index.php" title="Regresar" alt="Regresar"><img src="img/resultset_previous.png" /> Regresar </a></span></td></tr>
            </table>
            
        <?
	}
}else{
	echo "Ocurrio un error";
}
?>