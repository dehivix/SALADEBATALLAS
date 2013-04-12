<?php
require('clases/noticia.class.php');
$objCliente=new Noticia;
$consulta=$objCliente->mostrar_noticias();
?>
<script type="text/javascript">
$(document).ready(function(){
	// mostrar formulario de actualizar datos
	$("table tr .modi a").click(function(){
		$('#tabla').hide();
		$("#formulario").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
	
	// llamar a formulario nuevo
	$("#nuevo a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$.ajax({
			type: "GET",
			url: 'nuevo.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
});

</script>
<span><a href="crear_noticia.php"><img src="img/add.png" alt="Agregar dato" /></a></span>
<table>
   		<tr>
   		<th>Id</th>
		<th>Imagen</th>
    		<th>Fecha</th>
    		<th>Tema</th>
    		<th>Noticia</th>
            <th>Tipo</th>
            <th></th>
            <th></th>
        </tr>
<?php
if($consulta) {
	while( $noticia = mysql_fetch_array($consulta) ){
	?>
	
		  <tr id="fila-<?php echo $noticia['id'] ?>">
	
          <td><?php echo $noticia['id'] ?> </td>
<td><img width="20" height="20" src="<? echo"imagenes/".$noticia["imagen"];?>"/></td>
			  <td><?php echo $noticia['fecha'] ?></td>
			  <td><?php echo $noticia['titulo'] ?></td>
			  <td><?php echo $noticia['texto'] ?></td>
              <td><?php echo $noticia['tipo_noticia'] ?></td>
			   <td><span class="modi"><a href="actualizar.php?id=<?php echo $noticia['id'] ?>"><img src="img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $noticia['id'] ?>); return false" href="eliminar.php?id=<?php echo $noticia['id'] ?>"><img src="img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>
