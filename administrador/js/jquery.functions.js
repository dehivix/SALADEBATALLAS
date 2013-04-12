	function ActualizarDatos(){
		var id = $('#id').attr('value');
		var titulo = $('#titulo').attr('value');
		var texto = $('#texto').attr('value');
		var imagen = $("#imagen").attr("value");
		
		$.ajax({
			url: 'actualizar.php',
			type: "POST",
			data: "submit=&id="+id+"&titulo="+titulo+"&texto="+texto+"&imagen="+imagen,
			success: function(datos){
				alert(datos);
				ConsultaDatos();
				$("#formulario").hide();
				$("#tabla").show();
			}
		});
		return false;
	}
	
	function ConsultaDatos(){
		$.ajax({
			url: 'consulta.php',
			cache: false,
			type: "GET",
			success: function(datos){
				$("#tabla").html(datos);
			}
		});
	}
	
	function EliminarDato(id){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: 'eliminar.php',
				type: "GET",
				data: "id="+id,
				success: function(datos){
					alert(datos);
					$("#fila-"+id).remove();
				}
			});
		}
		return false;
	}
	
	
	
