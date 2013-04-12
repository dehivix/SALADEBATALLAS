<?php
if(isset($_POST['submit'])){
	require('clases/noticia.class.php');
	$objCliente=new Noticia;
	
	//Rescatando las variables con todos los caracteres especiales con: htmlspecialchars
	$id = htmlspecialchars(trim($_POST['id']));
	$titulo = htmlspecialchars(trim($_POST['titulo']));
	$texto = htmlspecialchars(trim($_POST['texto']));
	
	
	if ( $objCliente->actualizar(array($id,$titulo,$texto),$id) == true){
		echo 'Datos Actualizados correctamente';
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
	if(isset($_GET['id'])){
		
		require('clases/noticia.class.php');
		$objCliente=new Noticia;
		$consulta = $objCliente->mostrar_noticia($_GET['id']);
		$noticia = mysql_fetch_array($consulta);
	?>
	<form id="frmClienteActualizar" name="frmClienteActualizar" method="post" action="actualizar.php" onsubmit="ActualizarDatos(); return false">
    	<input type="hidden" name="id" id="id" value="<?php echo $noticia['id']?>" />
        <p>
	  <label>Titulo:<br />
	  <input class="text" type="text" name="titulo" maxlength="50" size="60" id="titulo" value="<?php echo $noticia['titulo']?>" />
	  </label>
      </p>
	  <p>
		<label>Texto:<br />
		<textarea name="texto" id="texto" value=""><?php echo $noticia['texto'] ?> </textarea>
		</label>
	  </p>
	  <p>
		<input type="submit" name="submit" id="button" value="Enviar" />
		<label></label>
		<input type="button" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
	  </p>
	</form>
	<?php
	}
}
?>
