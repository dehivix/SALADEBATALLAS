<?php 
//El codigo php comienza aqui 
//variables de sección
session_start();
if($_SESSION['activa']!=1){
 ?>

 <script>
  alert('Debes iniciar la seccion');
  window.location='../../login/login.php';

 </script>
 <?
  return;
}
?>

<?

/*if(!empty($_POST)){
	
	$carpeta = "../../../photos/".$_POST['carpeta'];
// Estructura de carpeta deseada
// Para crear una estructura anidada se debe especificar el parámetro $recursive
// en mkdir().
 

if(!mkdir($carpeta, 0, true))
{
    die('Fallo al crear carpetas...');
}

// ...

}*/

 ///////////////////////////////////////////////////////////////////////////////
 /*
  $status = "";
if ($_POST["action"] == "upload") {
	
	
	while(list($key,$value) = each($_FILES['archivos']['name']))
		{
			if(!empty($value))
			{
				$filename = $value;
					$filename=str_replace(" ","_",$filename);// Add _ inplace of blank space in file name, you can remove this line

					$add = "../../../photos/$filename";
                       //echo $_FILES['images']['type'][$key];
			     // echo "<br>";
					copy($_FILES['images']['tmp_name'][$key], $add);
					chmod("$add",0777);
			

			}
		}}*/
	
	$status = "";
    if ($_POST["action"] == "upload") {
	// obtenemos los datos del archivo
	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];$prefijo = substr(md5(uniqid(rand())),0,6);
        
	$archivo = $_FILES["archivo"]['name'];
	$carpeta = "../../../photos/".$_POST['carpeta'];

	if(!mkdir($carpeta))
	{
		$status = "No se ha podido crear el album";
	}

	else {
		
				//1. Conectar con mysql
					$conectar=mysql_connect('localhost','root', '');
				//2.Asignar base de datos
					$bd='saladebatallas';
				//3.Asignar consulta (QUERY) SQL
					$sql="INSERT INTO carpetas (nombre) VALUES ('".$_POST['carpeta']."')";
				//4.Ejecutar Consulta
					$resultado=mysql_db_query($bd,$sql);
                                        
				//5.Mostrar Posibles Error
					echo " ".mysql_error();
	
		
		$status = "Album creado con exito";
	}

}
 
function eliminar($arch){
    $tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];$prefijo = substr(md5(uniqid(rand())),0,6);

	$archivo = $_FILES["archivo"]['name'];
	$carpeta = "../../../photos/".$_POST['carpeta'];

	if(!rmdir($carpeta))
	{
        $status = "No se ha podido eliminar el album";
	}

	else {
		$status = "Album eliminado con exito";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" dir="ltr" id="minwidth" >
<head>
 <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/logo.ico">
  <title>Sala de batallas Social- Gestor de Noticias</title>
    
<link href="css/template.css" rel="stylesheet" type="text/css" />
<link href="../../css/menuv.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../../css/rounded.css" />
<link rel="stylesheet" type="text/css" href="../../css/style1.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />

	<script type="text/javascript" src="../../js/menu.js"></script>
	<script type="text/javascript" src="../../js/index.js"></script>
    <script src="../../js/jquery-1.2.6.min.js" type="text/javascript"></script>
	<script src="../../../js/jquery.tooltip.js" type="text/javascript"></script>
	<script type="text/javascript">

$(function() {
	// modify global settings
	$.extend($.fn.Tooltip.defaults, {
		track: true,
		delay: 0,
		showURL: false,
		showBody: " - "
	});
	$('a, input, img').Tooltip();
});
</script>
<script language="javascript" type="text/javascript">
	function setFocus() {
		document.frmEntrada.usuario.select();
		document.frmEntrada.usuario.focus();
	}
	
	
</script>
<script src="../../js/jquery.functions.js" type="text/javascript"></script>
    <script language=JavaScript>

<!--

function inhabilitar(){
	
    alert ("Opcion Desabilitada")
    return false
}

document.oncontextmenu=inhabilitar

// -->
</script>

<style type="text/css">
<!--
#minwidth body #page #general .home a strong {
	font-size: 10px;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
#minwidth body #page #general li a {
	font-size: 10px;
}
-->

</style>





<script language="javascript" src="js/AjaxUpload.2.0.min.js"></script>
<script language="javascript">
$(document).ready(function(){
	var button = $('#upload_button'), interval;
	new AjaxUpload('#upload_button', {
        action: 'upload.php',
		onSubmit : function(file , ext){
		if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
			// extensiones permitidas
			alert('Error: Solo se permiten imagenes');
			// cancela upload
			return false;
		} else {
			button.text('Subiendo');
			this.disable();
		}
		},
		onComplete: function(file, response){
			button.text('seleccionar imagenes');
			// enable upload button
			this.enable();			
			// Agrega archivo a la lista
			$('#lista').appendTo('.files').text(file);
		}	
	});
});
</script>
<script>
function EliminarDato(arch){
		var msg = confirm("Desea eliminar este dato?")
		if ( msg ) {
			$.ajax({
				url: 'eli-contesto.php',
				type: "GET",
				data: "arch="+arch,
				success: function(datos){
					alert(datos);
					$("#fila-"+arch).remove();
				}
			});
		}
		return false;
	}
	</script>
<style>
#searchForm{
	/* The search form. */
	background-color:#4C5A65;
	padding:50px 50px 30px;
	margin:80px 0;
	position:relative;

	-moz-border-radius:16px;
	-webkit-border-radius:16px;
	border-radius:16px;
}

fieldset{
	border:none;
}

#searchInputContainer{
	/* This div contains the transparent search box */
	width:420px;
	height:36px;
	background:url("img/searchBox.png") no-repeat;
	float:left;
	margin-right:12px;
}

#s{
	/* The search text box. */
	
	border:none;
	color:#888888;
	background:url("img/searchBox.png") no-repeat;
	
	float:left;
	font-family:Arial,Helvetica,sans-serif;
	font-size:15px;
	height:36px;
	line-height:36px;
	margin-right:12px;
	outline:medium none;
	padding:0 0 0 35px;
	text-shadow:1px 1px 0 white;
	width:385px;
}

/* The UL that contains the search type icons */

.icons{
	list-style:none;
	margin:10px 0 0 335px;
	height:19px;
	position:relative;
}

.icons li{
	background:url("img/icons.png") no-repeat;
	float:left;
	height:19px;
	text-indent:-9999px;
	cursor:pointer;
	margin-right:5px;
}


/* The submit button */


#submitButton{
	background:url('img/buttons.png') no-repeat;
	width:83px;
	height:36px;
	text-indent:-9999px;
	overflow:hidden;
	text-transform:uppercase;
	border:none;
	cursor:pointer;
}

#submitButton:hover{
	background-position:left bottom;
}


/* The Search tutorialzine.com / Search the Web radio buttons */


#searchInContainer{
	float:left;
	margin-top:12px;
	width:330px;
}

label{
	color:#DDDDDD;
	cursor:pointer;
	font-size:11px;
	position:relative;
	right:-2px;
	top:-2px;
	margin-right:10px;
	white-space:nowrap;
	/*float:left;*/
}

input[type=radio]{
	cursor:pointer;
	/*float:left;*/
}


</style>
</head>


<body>

<div id="page">
    <ul id="general">
      <li  class="home">
        <a href="../index.php" ><strong>Home <?php echo $_SESSION["nombres"]; ?></strong></a>      </li>
      <li>
        <a href="">Instituci&oacute;n</a> </li>
      <li >
        <a href="" >Projectos</a> </li>
      <li>
        <a href="">Registros</a> </li>
      <li>
        <a href="">Informes</a> </li>
      <li>
        <a href="" >Departamentos</a> </li>
      <li>
        <a href="admin.php" >Administrador</a> </li>
    </ul>
</div>
<div id="header">
      <h1>Sistema de Informaci&oacute;n</h1>
</div>
<ul class="menu">
	<li class="top"><a href="../gestorNoticias/gestor_noticias.php" class="top_link"><span>Gestor de Noticias</span></a></li>
	<li class="top"><a href="#" class="top_link"><span>Gestor Multimedia</span></a>
		<ul class="sub">
			<li><a href="#">Galeria de Imagenes</a></li>			
			<li><a href="#">Galeria de Videos</a></li>

		</ul>
	</li>
	
	<li class="top"><a href="../../failed/failed.php" class="top_link"><span>cerrar secci&oacute;n</span></a></li>
</ul>

    <div id="content-box">
		<div class="border">
			<div class="padding">

				<div id="element-box">

					<div class="t">
						<div class="t">
							<div class="t"></div>
						</div>
					</div>
                    <div class="m" >
<table class="adminform" >
	<tr>
	<td width="55%" valign="top">
	<p class="b"><strong><h2 aling="center">Administrador</h2></strong></p>
                    
                             <div id="cpanel">
			<div style="float:center;">

<form id="searchForm" method="post">
		<fieldset>
        

<input name="carpeta" type="text" maxlength="15" onfocus="if(this.value=='Nombre del Album') this.value='';" onblur="if(this.value=='') this.value='Nombre del Album';" onmouseover="this.className='Nombre_del_Album1'" onmouseout="this.className='Nombre_del_Album2';" id="s"/>
<input name="enviar" type="submit" id="submitButton"  value="Crear Album" /> <br />
Seleccione el archivo a subir:
<br />
<input name="action" type="hidden" value="upload"  />

<!--input name="archivo" type="file" class="multi" accept="gif|jpg" /-->
<!--input name="archivo" type="file" class="casilla" id="archivo" size="35" /-->
<div id="upload_button" class="greenButton" style="float:left" >Seleccionar Imagenes</div>
<ul id="lista">
</ul>

<?php echo $status; ?>
        
        </fieldset>
        </form>

                                    
		</div>
				<div style="float:left;"></div>
			</div>

						  </td>
                          </tr>
						</table>

						<div class="clr"></div>
			    </div>

			<div class="m" >
						<table class="adminform">
						<tr>

							<td width="55%" valign="top">
                            <p class="b">&nbsp;</p>
                            <div id="cpanel">
                              <div style="float:center;">
                                  <table>
                                      <tr>
                                          <td height="30" class="subtitulo" ><strong><h2>Listado de Albumes Subidos </h2></strong></td>
  </tr>
  <tr onClick="">
     
    <td class="infsub">
	<?php
	if ($gestor = opendir('../../../photos/')) {
		echo "<ul>";
	    while (false !== ($arch = readdir($gestor))) {
		   if ($arch != "." && $arch != "..") {
                        
						?>
					
						<?
                        }
	    }
	    closedir($gestor);
		echo "</ul>";
	}
	?>


</td>

  </tr>
       </table>
	</div>
<div id="tabla">
  <?php include('consulta.php') ?>
</div>
				
</body>
</html>
