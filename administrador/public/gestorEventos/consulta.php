
<?php
require('clases/evento.class.php');
$objCliente=new Evento;
$consulta=$objCliente->mostrar_evento();
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
<table>
   		<tr>
   			<th>Id</th>
			<th>Fecha</th>
    		<th>Hora</th>
    		<th>Nombre</th>
            <th>Sitio</th>
            <th>Direccion</th>
            <th>Informaci&oacute;</th>
            <th></th>
            <th></th>
        </tr>
<?php
if($consulta) {
	while( $noticia = mysql_fetch_array($consulta) ){
	?>
	
		  <tr id="fila-<?php echo $noticia['id'] ?>">
	
          <td><?php echo $noticia['id'] ?> </td>
			  <td><?php echo $noticia['fecha'] ?></td>
			  <td><?php echo $noticia['hora'] ?></td>
			  <td><?php echo $noticia['nombre'] ?></td>
              <td><?php echo $noticia['sitio'] ?></td>
              <td><?php echo $noticia['direccion'] ?></td>
              <td><?php echo $noticia['informacion'] ?>
			   <td><span class="modi"><a href="actualizar.php?id=<?php echo $noticia['id'] ?>"><img src="../gestorImagenes/img/database_edit.png" title="Editar" alt="Editar" /></a></span></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $noticia['id'] ?>); return false" href="eliminar.php?id=<?php echo $noticia['id'] ?>"><img src="../gestorImagenes/img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>

        
