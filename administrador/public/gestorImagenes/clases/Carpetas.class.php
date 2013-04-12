<?php 
include_once("conexion.class.php");

class x{
 //constructor	
 	var $con;
 	function x(){
 		$this->con=new DBManager;
 	}

	function insertar($campos){
		if($this->con->conectar()==true){
			//insertarrr
			return mysql_query("INSERT INTO carpetas (nombre) VALUES ('".$campos[1]."')");
		}
	}
	
	/*function actualizar($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE videos SET video_url = '".$campos[1]."', video_title = '".$campos[2]."' WHERE video_id = ".$id);
		}
	}

	
	function mostrar_Carpeta($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM carpetas");
		}
	}*/

	function mostrar_Carpetas(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM carpetas ORDER BY id DESC");
		}
	}

	/*function muestro_datos(){
	if($this->con->conectar()==true){
		return mysql_query("SELECT * FROM carpetas");
		}
		
	}*/
	
	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM carpetas WHERE id=".$id);
		}
	}
}
?>
