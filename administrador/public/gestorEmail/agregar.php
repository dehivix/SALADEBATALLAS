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
	
	require('clases/email.class.php');

	$name = htmlspecialchars(trim($_POST['name']));
	$email = htmlspecialchars(trim($_POST['email']));
	$asunto = htmlspecialchars(trim($_POST['asunto']));
	$mensaje = htmlspecialchars(trim($_POST['mensaje']));


		
	$objCliente=new Email;
	if ( $objCliente->insertar(array($id,$name,$email,$asunto,$mensaje)) == true){
		header("location:index.php");
		
	}else{
		echo 'Se produjo un error. Intente nuevamente';
	} 
}
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/logo.ico" />
  <title>Sala de batallas Social</title>
    
<link href="../../css/template.css" rel="stylesheet" type="text/css" />
<link href="../../css/menuv.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="../../css/style1.css" />

<script type="text/javascript" src="clases/validacion.js"></script>

 <link rel="shortcut icon" type="image/x-icon" href="administrador/images/favicon/logo.ico">
  <title>Gobierno Bolivariano de Venezuela - Sala de batallas</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/stat.css" type="text/css" charset="utf-8"/>
  <link rel="stylesheet" href="css/basic.css" type="text/css" />
  <script type="text/javascript" src="ajax.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
  <script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
  <script type="text/javascript" src="js/roundabout_shapes.js"></script>
  <script type="text/javascript" src="js/gallery_init.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
<script type='text/javascript' src='js/basic/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic/basic.js'></script>  

<style>
	body { font: 0.8em Arial, sans-serif; }
	.pageContent { width: 800px; }
	.accordion { list-style-type: none; padding: 0; margin: 0 0 30px; border: 1px solid #17a; border-top: none; border-left: none; }
	.accordion ul { padding: 0; margin: 0; float: left; display: block; width: 100%; }
	.accordion li { background: #999; cursor: pointer; list-style-type: none; padding: 0; margin: 0; float: left; display: block; width: 100%;}
	.accordion li.active>a { background: url('close.gif') no-repeat center right; }
	.accordion li div { padding: 20px; background: #ccc; display: block; clear: both; float: left; width: 760px;}
	.accordion a { text-decoration: none; border-bottom: 1px solid #4df; font: bold 1.1em/2em Arial, sans-serif; color: #222; padding: 0 10px; display: block; cursor: pointer; background: url('open.gif') no-repeat center right;}
	
	/* Level 2 */
	.accordion li ul li { background: #7FD2FF; font-size: 0.9em; }

	</style>


</head>


<body>
 <!-- header -->
  <header>
    <div class="container">
    	<h1><a href="index.html">Sala de Batallas Social</a></h1>
      <nav>
        <ul>
        	<li><a href="#" class="current">Inicio</a></li>
          <li><a href="galeria.php">Galería</a></li>
          <li><a href="videos_nuevos.php">Videos</a></li>
          <li><a href="noticias.php">Eventos</a></li>
          <li><a href="noticias.php">Noticias</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
      </nav>
    </div>
	</header>
  <!-- #gallery -->
<section id="gallery">
  <ul id="navigation">
            <li class="home"><a href="administrador/login/login.php" title="Entrar al sistema"></a></li>
  </ul>
  <div class="container">
   	  <ul id="myRoundabout">
      	<li><img src="images/chavez1.jpg" alt=""></li>
        <li><img src="images/chavez2.jpg" alt=""></li>
        <li><img src="images/chavez3.jpg" alt=""></li>
        <li><img src="images/chavez4.jpg" alt=""></li>
        <li><img src="images/chavez5.jpg" alt=""></li>
    </ul>
  </div>
</section>

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
						<table class="">
						<tr>

							<td width="55%" valign="top">
								<p class="b"><strong>Administrador</strong></p>
                            
                               <div id="">
                  
        <div id="pageWrap" class="pageWrap" aling="center">
    	<div class="pageContent">

		<ul class="accordion">
		<li>
		<a href="#videos">Nuevo Videos</a>
	<div><span>

		<form action="agregar.php" method="post" enctype="multipart/form-data"  onSubmit="return validar(this)">

			Nombre
			<p>
			<input name="name" type="text" maxlength="100" size="40" />
			</p>
			Email
			<p>
			<input name="email" type="text" maxlength="50" size="40" />
			</p>
            Asunto
            <p>
			<input name="asunto" type="text" maxlength="50" size="40" />
			</p>
            Mensaje
            <p>
			<textarea cols="40" name="mensaje" rows="10"></textarea>
			</p>
			<p>
			<input name="enviar" type="submit" value="Enviar" class="greenButton" />
			</p>
		</form>
	</span></div>
<script src="dependencies/jquery-1.3.2.js" type="text/javascript" charset="utf-8"></script>
	<script src="jquery.accordion.source.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		// <![CDATA[
			
		$(document).ready(function () {
			$('ul').accordion();
		});
				
		// ]]>
	</script>

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

</body>
</html>-->
