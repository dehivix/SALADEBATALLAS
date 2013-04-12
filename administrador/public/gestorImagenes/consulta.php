<?php
require('clases/Carpetas.class.php');
$objCliente=new x;
$consulta=$objCliente->mostrar_Carpetas();
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
   		<th class="greenButoon">Nombre de Album</th>
        <th></th>
        </tr>
<?php
if($consulta) {
	while( $video = mysql_fetch_array($consulta) ){
	?>
	
		  <tr id="fila-<?php echo $video['id'] ?>">
	
          <td><?php echo $video['nombre'] ?> </td>
	  <td><span class="dele"><a onClick="eliminar(<?php echo $video['id'] ?>); return false" href="eliminar.php?id=<?php echo $video['id'] ?> & nombre=<?php echo $video['nombre'] ?>"><img src="img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>
