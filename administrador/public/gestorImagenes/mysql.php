<?php  
class MySQL{  
 private $conexion;  
 private $total_consultas;

 public function MySQL(){  
   if(!isset($this->conexion)){  
      $this->conexion = (mysql_connect("localhost","root","0000")) or die(mysql_error());  
      mysql_select_db("saladebatallas",$this->conexion) or die(mysql_error());  
   }  
  }  
  public function consulta($consulta){
   $this->total_consultas++;  
   $resultado = mysql_query($consulta,$this->conexion);  
   if(!$resultado){  
   echo 'MySQL Error: ' . mysql_error();  
   exit;  
   }  
   return $resultado;   
   }  
  public function vectorizar($consulta){
   return mysql_fetch_array($consulta);  
   }  
  public function cuenta_filas($consulta){   
   return mysql_num_rows($consulta);  
   }  
  public function getTotalConsultas(){  
   return $this->total_consultas;  
   }

    public function insertar_usuario($nombre, $cedula, $correo){
      $sql = "INSERT INTO usuarios(nombre, cedula, correo) VALUES ('$nombre', $cedula, $correo)";
      $this->consulta($sql);
    }

    public function borrar_usuario($cedula){//$db->borrar_usuario($cedula);
      $sql = "DELETE FROM usuarios WHERE cedula='$cedula'";
      $this->consulta($sql);
    }
}

?>