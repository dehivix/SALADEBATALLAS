<?php 
include_once("conexion.class.php");

class Evento{
 //constructor	
 	var $con;
 	function Evento(){
 		$this->con=new DBManager;
 	}

	function insertar($campos){
		if($this->con->conectar()==true){
			//insertarrr
			return mysql_query("INSERT INTO eventos(id, fecha, hora, nombre, sitio, direccion, informacion) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."','".$campos[6]."')");
		}
	}
	
	function mostrar_evento(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM eventos ORDER BY id DESC");
		}
	}
	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM eventos WHERE id=".$id);
		}
	}
	function paginador($x,$y){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM eventos ORDER BY id DESC LIMIT $x, $y");
		}
	}
	function muestro_datos(){
	if($this->con->conectar()==true){
		return mysql_query("SELECT * FROM eventos");
		}
		
	}
	
}
?>
