<?php 
include_once("conexion.class.php");

class Email{
 //constructor	
 	var $con;
 	function Email(){
 		$this->con=new DBManager;
 	}

	function insertar($campos){
		if($this->con->conectar()==true){
			//insertarrr
			return mysql_query("INSERT INTO email (nombre, email, asunto, mensaje) VALUES ('".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."')");
		}
	}
	
	function actualizar($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE videos SET video_url = '".$campos[1]."', video_title = '".$campos[2]."' WHERE id = ".$id);
		}
	}

	
	function mostrar_email($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM email");
		}
	}

	function mostrar_emails(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM email ORDER BY id DESC");
		}
	}

	function muestro_datos($id){
	if($this->con->conectar()==true){
		return mysql_query("SELECT * FROM email WHERE id=".$id);
		}
		
	}
	
	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM email WHERE id=".$id);
		}
	}
	
	function paginador($x,$y){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM email ORDER BY id LIMIT $x, $y");
		}
	}
	
		function muestro_paginador(){
	if($this->con->conectar()==true){
		return mysql_query("SELECT * FROM email");
		}
		
	}
	
}