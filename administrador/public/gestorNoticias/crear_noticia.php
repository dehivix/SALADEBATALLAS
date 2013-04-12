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
if(isset($_POST['enviar'])){
	
	require('clases/noticia.class.php');

	
if(is_uploaded_file($_FILES['foto']['tmp_name']))
{
$nombrearchivo = $_FILES['foto']['name'];
$directorio = 'imagenes/';
$urlimagen= $directorio;
if (move_uploaded_file($_FILES['foto']['tmp_name'], $directorio.$nombrearchivo))
{
chmod($urlimagen, 0777);
$fecha= date("Y-m-d");
}
else
{
echo "La imagen no ha podido moverse de directorio";
}
}
else
{
echo "La imagen no ha podido subirse al servidor";
}

	$id = htmlspecialchars(trim($_POST['id']));
	$titulo = htmlspecialchars(trim($_POST['titulo']));
	$texto = htmlspecialchars(trim($_POST['texto']));
	$tipo_noticia = htmlspecialchars(trim($_POST['tipo_noticia']));
		
	$objCliente=new Noticia;
	if ( $objCliente->insertar(array($id,$titulo,$texto,$fecha,$tipo_noticia,$nombrearchivo)) == true){
		header("location:gestor_noticias.php");
		
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}else{
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" dir="ltr" id="minwidth" >
<head>
 <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/logo.ico" />
  <title>Sala de batallas Social</title>
    
<link href="../../css/template.css" rel="stylesheet" type="text/css" />
<link href="../../css/menuv.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../../css/rounded.css" />
<link rel="stylesheet" type="text/css" href="../../css/style1.css" />

<script src="stiloalert/mootools.js" type="text/javascript"></script>
<link rel="stylesheet" href="stiloalert/sexyalertbox.css" type="text/css" media="all" />
<script src="stiloalert/sexyalertbox.packed.js" type="text/javascript"></script>
<script type="text/javascript" src="clases/validacion.js"></script>

<script type="text/javascript" src="../../js/menu.js"></script>
<script type="text/javascript" src="../../js/index.js"></script>

<script type="text/javascript" src="../../js/ext-core.js"></script>
<script type="text/javascript" src="../../js/elastic-textarea.js"></script>

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
        $(document).ready(function(){
            setTimeout(function(){ $(".mensajes").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 3000);  
        });
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
        <a href="../index.php" ><strong>Home</strong></a>      </li>
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
	<li class="top"><a href="gestorNoticias/gestor_noticias.php" class="top_link"><span>Gestor de Noticias</span></a>
    <ul class="sub">
    <li><a href="gestorEventos/index.php" class="top_link">Gestor de Eventos</a></li>
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
						<table class="adminform">
						<tr>

							<td width="55%" valign="top">
								<p class="b"><strong>Administrador</strong></p>
                            
                                <div id="inputArea">
                              
        <form action="crear_noticia.php" method="post" enctype="multipart/form-data" name="uploadform" onSubmit="return formulario()">
<strong>Introducci&oacute;n de noticia</strong><br />
<br />
<br />
Tipo de noticia<br />
<input name="tipo_noticia" type="radio" value="Noticias" />Noticias <br/>
<input name="tipo_noticia" value="Novedades" type="radio" />Novedades<br/>
<input name="tipo_noticia" value="Recomendaciones" type="radio" />Recomendaciones<br/><br />
Inserte titulo de la noticia
<p>
<input name="titulo" type="text" maxlength="50" size="60" />
</p>
Inserte texto de la noticia
<p>
<textarea name="texto" id="texto"> </textarea>
<script type="text/javascript">
	elasticTextArea("texto");
</script>
</p>
<p>
Enviar imagen: <input name="foto" type="file" /><br />
<br />
<input name="enviar" type="submit" value="Enviar formulario" class="greenButton"  />
</p>
</form>

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
		  Generales de Uso</span> | <span  class="footer">T&eacute;rminos Legales</span></p>
</div>
<?php

}

?>
</body>
</html>
