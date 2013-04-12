<?php
session_start();
include('../conexion/conexion.php');

extract($_POST);

if($boton=='Enviar'){
if (ereg("^[a-zA0-Z9]+$",$usuario)) { 
conectar();
$sql=mysql_query("SELECT *FROM admin WHERE usuario='$usuario' AND clave='$clave'");
desconectar();

		if(mysql_num_rows($sql)>0){

      				$registro=mysql_fetch_array($sql);
      					//variables de control de sección
						$_SESSION["cedula"]=$registro["cedula"];
      					$_SESSION["nombres"]=$registro["nombres"];
      					$_SESSION["apellidos"]=$registro["apellidos"];
     					$_SESSION["sexo"]=$registro["sexo"];
	  					$_SESSION["fecha"]=$registro["fecha"]; 
	  					$_SESSION["direccion"]=$registro["direccion"];
	  					$_SESSION["celular"]=$registro["celular"];
	  					$_SESSION["telecasa"]=$registro["telecasa"];
	  					$_SESSION["usuario"]=$registro["usuario"];
	  					$_SESSION["clave"]=$registro["clave"];
						
      						$_SESSION['activa']=1;
      						$_SESSION['completo']=$registro[2].", ".$registro[1];
     						 ?>
      						<script>
          					alert('Bienvenido al sistema')
          					window.location='../public/index.php'

      						</script>
      						<?
		}else{
			
			?>

  <script>
          alert('Tus datos no coiciden o no tienes permisos de administrador')
          window.location='login.php'

      </script>

  <?

		}//fin de if de mysql_num_rows

} else {
	
	
?>
      <script>
          alert('Error solo se permite Caracteres Alfanumerico')
          window.location='login.php'

      </script>
      <?
	
	
	
	}	
	
	
	
}


?>
