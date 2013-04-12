<?
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" dir="ltr" id="minwidth" >
<head>
 <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/logo.ico">
  <title>Sala de batallas Social- Gestor de Noticias</title>
    <meta charset="utf-8">
<link href="../../css/template.css" rel="stylesheet" type="text/css" />
<link href="../../css/menuv.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../../css/rounded.css" />
<link rel="stylesheet" type="text/css" href="../../css/style1.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />

<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="../../js/menu.js"></script>
	<script type="text/javascript" src="../../js/index.js"></script>
        <script src="../../js/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="../../js/jquery.tooltip.js" type="text/javascript"></script>
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


<link rel="stylesheet" href="sexyalertbox.css" type="text/css" media="all" />
<script src="sexyalertbox.packed.js" type="text/javascript"></script>


<script type="text/javascript">
window.addEvent('domready', function() {
    Sexy = new SexyAlertBox();
});

function test() {
    Sexy.prompt('<h1>Registro de usuarios</h1>Ingresa tu nombre para poder identificarte en el sistema.','Eduardo' ,{ onComplete: 
      function(returnvalue) {
        if(returnvalue)
        {
          Sexy.confirm('<h1>Bienvenido '+returnvalue+',</h1><p>¿Deseas ver el about us?</p><p>Pulsa "Ok" para continuar, o pulsa "Cancelar" para salir.</p>', {onComplete: 
            function(returnvalue) { 
              if(returnvalue)
              {
                Sexy.info();
              }
              else
              {
                Sexy.alert('<h1>SexyAlertBox</h1><em>versión 1.1</em><br/><p>No te olvides de visitar <a href="http://www.coders.me/">www.coders.me</a> está lleno de artículos de programación.</p>');
              }
            }
          });
        }
        else
        {
          Sexy.error('<h1>Error al intentar entrar al sistema</h1><p>Para continuar, debes ingresar un nombre en la casilla de Nombre.</p><p>Inténtalo de nuevo.</p>');
        }
      }
    });
}
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
</head>


<body>
<div id="page">
    <ul id="general">
      <li  class="home">
        <a href="../index.php" ><strong>Home<?php echo $_SESSION["nombres"]; ?></strong></a>      </li>
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
			<li><a href="../gestorImagenes/index.php">Galeria de Imagenes</a></li>			


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
						<table class="adminform">
						<tr>
							
							<td width="55%" valign="top">
								<p class="b"><strong>Email</strong></p>
                                <div id="contenedor">
    <div id="formulario" style="display:none;">
    </div>
    <div id="tabla">
    <?php include('consulta.php') ?>
    </div>
</div>
                                
								<div id="cpanel">
								  <div style="float:left;">
			<div class="icon"></div>
		</div>
				<div style="float:left;"></div>
			</div>
	
						  </td>
                          </tr>
						</table>
                  </div>
                    
								<div class="b">
						<div class="b">
							<div class="b"></div>
						</div>
					</div>
				</div>
				<noscript>
					¡Advertencia! JavaScript debe estar habilitado para un correcto funcionamiento de la Administración				</noscript>

				<div class="clr"></div>
			</div>
		</div>
	</div>
	<div id="border-bottom"><div><div></div></div></div>
	<div id="footer">
		<p class="copyright">(c) 2010. All rights reserved. Design by <a href="creditos.html">J.E.D.:::.</a><br />
Spanish 2009</p>
		<p class="copyright"><span  class="footer">Políticas de Uso</span> | <span  class="footer">Condiciones
		  Generales de Uso</span> | <span  class="footer">Términos Legales</span></p>
</div>
</body>
</html>
