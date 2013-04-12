<?php 
include_once("conexion.class.php");

class Noticia{
 //constructor	
 	var $con;
 	function Noticia(){
 		$this->con=new DBManager;
 	}

	function insertar($campos){
		if($this->con->conectar()==true){
			//insertarrr
			return mysql_query("INSERT INTO noticias (id, titulo, texto, fecha, tipo_noticia, imagen) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."')");
		}
	}
	
	function actualizar($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE noticias SET titulo = '".$campos[1]."', texto = '".$campos[2]."' WHERE id = ".$id);
		}
	}
	function noticias_recientes($id){
		if($this->con->conectar()==true){
		return mysql_query("SELECT * FROM noticias WHERE id= ".$id);
		}
	}
	
	function mostrar_noticia($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM noticias");
		}
	}

	function mostrar_noticias(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM noticias ORDER BY id DESC");
		}
	}

	function paginador($x,$y){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT $x, $y");
		}
	}
	function muestro_datos(){
	if($this->con->conectar()==true){
		return mysql_query("SELECT * FROM noticias");
		}
		
	}
	
	function eliminar($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM noticias WHERE id=".$id);
		}
	}
}
?>
