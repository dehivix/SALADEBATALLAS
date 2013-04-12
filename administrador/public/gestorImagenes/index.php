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
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="../../js/menu.js"></script>
	<script type="text/javascript" src="../../js/index.js"></script>
    <script src="../../js/jquery-1.2.6.min.js" type="text/javascript"></script>
	<script src="../../../js/jquery.tooltip.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
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
<script type="text/javascript">
//<![CDATA[

// The following function calculates the date of the julien easter
// and then uses this to set the disabled dates for the datePicker
datePickerController.onupdate = function(dp) {
        // dp = the datePicker object
        // dp.date = the datePickers date object
        
        x = dp.date.getFullYear();
        a=x%4;
        b=x%7;
        c=x%19;
        d=(19*c+15)%30;
        e=(2*a+4*b-d+34)%7;
        f=Math.floor((d+e+114)/31);
        g=(d+e+114)%31+1;
        if (f==3) {month=3};
        if (f==4) {month=4};
        var dt = datePickerController.dateFormat(x + "/" + month + "/" + g);

        dp.setDisabledDates([dt]);

        // Create a dynamic style for easter (for demo purposes, it just colours the background red and the text white)
        var def = "div.datePicker table tbody tr td.dmy-" + g + "-" + (month) + "-" + x + " { background:#880000 !important; color:#fff !important; }";

        var es = document.getElementById("easterStyle");
        
        if (es.styleSheet) {   // IE
                es.styleSheet.cssText = def;
        } else {               // the world
                var tt1 = document.createTextNode(def);
                while(es.firstChild) es.removeChild(es.firstChild);
                es.appendChild(tt1);
        };
};

//]]>
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
#searchForm{
	/* The search form. */
	background-color:#aabbcc;
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
	background:url('img/buttons1.png') no-repeat;
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
#minwidth body .padding #element-box .m .adminform tr td strong h2 {
	font-size: 14px;
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
	<li class="top"><a href="../gestorNoticias/gestor_noticias.php" class="top_link"><span>Gestor de Noticias</span></a>
    <ul class="sub">
    <li><a href="../gestorEventos/index.php" class="top_link">Gestor de Eventos</a></li>
        <li><a href="../gestorEmail/index.php" class="top_link">Visor De Email</a></li>
    </ul>
    </li>
	<li class="top"><a href="#" class="top_link"><span>Gestor Multimedia</span></a>
		<ul class="sub">
			<li><a href="#">Galeria de Imagenes</a></li>			


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
	<p class="b"><strong>
	<h2 aling="center">Gestor de im&aacute;genes</h2></strong></p>
                    
                             <div id="cpanel">
			<div style="float:center;">
			  <form id="searchForm" method="post">
			  <fieldset>
			    <input name="carpeta"  type="text" maxlength="15" onFocus="if(this.value=='Nombre del Album') this.value='';" onBlur="if(this.value=='') this.value='Nombre del Album';" onMouseOver="this.className='Nombre_del_Album1'" onMouseOut="this.className='Nombre_del_Album2';" id="s"/>
<input name="enviar" type="submit" title="crear album"  id="submitButton"  value="Crear Album" /> <br /><br />
Seleccione el archivo a subir:<br />
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
	</div>
    <div id="CollapsiblePanel1" class="CollapsiblePanel">
                      <div class="CollapsiblePanelTab" tabindex="0"><img src="Free-Database-Add-icon.png" width="32" height="32" border="0" /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Listado de Albumes Subidos</strong></div>
                      <div class="CollapsiblePanelContent"><div id="tabla" ><br  /><?php include('consulta.php') ?></div></div>
                    </div>
</div>


			
<script type="text/javascript">
<!--
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
//-->
    </script>
</body>
</html>
