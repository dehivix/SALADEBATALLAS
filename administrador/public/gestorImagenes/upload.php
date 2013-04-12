<?php
//1. Conectar con mysql
					$conectar=mysql_connect('localhost', 'root', '0000');
				//2.Asignar base de datos
					$bd='saladebatallas';
				//3.Asignar consulta (QUERY) SQL
					$sql="SELECT * FROM carpetas ORDER BY id DESC";
				//4.Ejecutar Consulta
					$resultado=mysql_db_query($bd,$sql);                    
				//5.Mostrar Posibles Error
					echo " ".mysql_error();
				//6.Cargar Datos del array
					$vector = mysql_num_rows($resultado);
					if($vector){
    				$vector = mysql_fetch_array($resultado);
    				$nombre = $vector['nombre'];
					}
$uploaddir = "../../../photos/".$nombre."/";
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "success";
} else {
  echo "error";
}
?>