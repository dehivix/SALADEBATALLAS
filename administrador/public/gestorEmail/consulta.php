<?php
require('clases/email.class.php');

$objCliente=new Email;
$consulta=$objCliente->mostrar_emails();
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
		<th>Nombre</th>
            <th>Asunto</th>
            <th></th>
            <th></th>
        </tr>
        
        

<?php

if($consulta) {
	while( $email = mysql_fetch_array($consulta) ){
	?>
		
		  <tr id="fila-<?php echo $email['id'] ?>">
	
          <td><?php echo $email['id'] ?> </td>
			  <td><?php echo $email['nombre'] ?></td>

              <td><?php echo $email['asunto'] ?></td>
			   <td><span class="modi"><a href="leer.php?id=<?php echo $email['id'] ?>"><img src="img/database_edit.png" title="Leer" alt="Leer" /></a></span></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $email['id'] ?>); return false" href="eliminar.php?id=<?php echo $email['id'] ?>"><img src="img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>
    
    
