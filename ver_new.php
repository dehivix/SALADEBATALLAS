<?php

require_once('Connections/busqueda.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_categoria = "-1";
if (isset($_GET['id'])) {
  $colname_categoria = $_GET['id'];
}

mysql_select_db($database_busqueda, $busqueda);
$query_categoria = sprintf("SELECT * FROM noticias WHERE id = %s", GetSQLValueString($colname_categoria, "text"));
$categoria = mysql_query($query_categoria, $busqueda) or die(mysql_error());
$row_categoria = mysql_fetch_assoc($categoria);
$totalRows_categoria = mysql_num_rows($categoria);
do{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="image/x-icon" href="administrador/images/favicon/logo.ico">
  <title>Gobierno Bolivariano de Venezuela - Sala de batallas - Noticias</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
  <script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
<link rel="stylesheet" href="css/slider.css" type="text/css" media="screen" />
  <script type="text/javascript">var _siteRoot='index.html',_root='index.html';</script>
  <link href="css/css_pirobox/style_1/style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/pirobox_extended.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
	$().piroBox_ext({
	piro_speed : 700,
		bg_alpha : 0.5,
		piro_scroll : true // pirobox always positioned at the center of the page
	});
});
</script>

  <!--[if lt IE 7]>
  	<link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="all">
  <![endif]-->
  <!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
    <script type="text/javascript" src="js/IE9.js"></script>
  <![endif]-->
</head>

<body>
  <!-- header -->
  <header>
    <div class="container">
    	<h1><a href="index.html">Sala de Batallas Social</a></h1>
      <nav>
        <ul>
        	<li><a href="index.php" >Inicio</a></li>
          <li><a href="galeria.php">Galer&iacute;a</a></li>
          <li><a href="eventos/eventos.php">Eventos</a></li>
          <li><a href="noticias.php" class="current">Noticias</a></li>
          <li><a href="contacts.php">Contacto</a></li>
        </ul>
      </nav>
    </div>
	</header>
  <!-- #gallery -->
  <section id="">
    <div id="header"><div class="wrap">
   <div id="slide-holder">
<div id="slide-runner">
    <a href=""><img id="slide-img-1" src="images/nature-photo.jpg"  class="slide" alt="" /></a>
    <a href=""><img id="slide-img-2" src="images/nature-photo1.png" class="slide" alt="" /></a>
    <a href=""><img id="slide-img-3" src="images/nature-photo2.png" class="slide" alt="" /></a>
    <a href=""><img id="slide-img-4" src="images/nature-photo3.png" class="slide" alt="" /></a>
    <a href=""><img id="slide-img-5" src="images/nature-photo4.png" class="slide" alt="" /></a>
    <a href=""><img id="slide-img-6" src="images/nature-photo4.png" class="slide" alt="" /></a>
	<a href=""><img id="slide-img-7" src="images/nature-photo6.png" class="slide" alt="" /></a> 
    <div id="slide-controls">
     <p id="slide-client" class="text"><strong>post: </strong><span></span></p>
     <p id="slide-desc" class="text"></p>
     <p id="slide-nav"></p>
    </div>
</div>
	
	<!--content featured gallery here -->
   </div>
   <script type="text/javascript">
    if(!window.slider) var slider={};slider.data=[{"id":"slide-img-1","client":"Hugo Chavez Fria","desc":"Presidente de Venezuela"},{"id":"slide-img-2","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-3","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-4","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-5","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-6","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-7","client":"nature beauty","desc":"add your description here"}];
   </script>
  </div></div>
</section>
  <!-- /#gallery -->
  <div class="main-box">
    <div class="container">
      <div class="inside">
        <div class="wrapper">
        	<!-- aside -->
          <aside>
<marquee class="" direction="up" scrolldelay="10" scrollamount="1" onMouseOver="this.stop()" onMouseOut="this.start()">
	    <h2>Acerca<span>de Sala de batallas</span></h2>
            <div class="img-box">
            	<figure><a href="http://www.mpcomunas.gob.ve/"><img src="images/comunas/comunas1.jpg" alt=""></a></figure>
			
		<p align="justify">Garantizar la construcci&oacute;n de los espacios de articulaci&oacute;n y vinculaci&oacute;n entre los consejos comunales, movimientos 			sociales, ciudadanos (as) y las Instituciones del Ministerio del Poder Popular para las Comunas y Protecci&oacute;n social. Se encuentra 			adscrita al Despacho del Viceministerio de Participaci&oacute;n del Poder Comunal.</p>
            </div>
            <p align="justify">"Con la creaci&oacute;n de las Salas de Batalla Social se trata de ir sembrando el socialismo desde abajo, se trata de ir convirtiendo en realidad los valores del socialismo, el humanismo, la solidaridad, la suprema felicidad social, la plena existencia humana, se trata de llevar adelante lo que est&aacute; sealado en nuestra Constituci&oacute;n sobre democracia participativa y protag&oacute;nica."</p> 
                                                    <p><b><i>Hugo R. Ch&aacute;vez Fras.</i></b></p>
</marquee>
          </aside>
          <!-- content -->
          <section id="content">
            <article>
            	<h2>Noticias<span>Cargadas</span></h2>
              <!-- .team-list -->
              <ul class="">
              <li>
				<figure><a href="<? echo"administrador/public/gestorNoticias/imagenes/".$row_categoria["imagen"];?>" rel="gallery"  class="pirobox_gall" title="SALA DE BATALLAS - VENEZUELA">
               <img width="200" hight="200" src="<? echo"administrador/public/gestorNoticias/imagenes/".$row_categoria["imagen"];?>"/>
                </a></figure>
                <h3><a href="ver_new.php?id=<?php echo $row_categoria['id'] ?>"  class='basic' value=""><? print htmlentities($row_categoria["titulo"]); ?></a></h3>

               <p align="justify"><? echo htmlentities($row_categoria["texto"]); ?></p>
				</li>
                </ul>
              <!-- /.team-list -->
            </article> 
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <footer>
    <div class="container">
    	<div class="wrapper">
        <div class="fleft">(c) 2010. All rights reserved. Design by J.E.D.:::.</div>
        <div class="fright"><a href="http://www.chavez.org.ve/" target="_blank">Blog Hugo R. Ch&aacute;vez Fr&iacute;a</a></div>
      </div>
    </div>
  </footer>
  <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>



<?php  /*echo $row_categoria['id']; ?>
<?php echo $row_categoria['titulo']; ?>
<?php echo $row_categoria['texto']; */?>



<?php } while ($row_categoria = mysql_fetch_assoc($categoria)); ?>
<?php
mysql_free_result($categoria);
?>