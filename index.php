<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="shortcut icon" type="image/x-icon" href="administrador/images/favicon/logo.ico">
  <title>Gobierno Bolivariano de Venezuela - Sala de batallas</title>
  <meta charset="utf-8">
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/stat.css" type="text/css" charset="utf-8"/>
  <link rel="stylesheet" href="css/basic.css" type="text/css" />
  <script type="text/javascript" src="ajax.js"></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
  <script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
  <script type="text/javascript" src="js/roundabout_shapes.js"></script>
  <script type="text/javascript" src="js/gallery_init.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
  
    


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
    	<h1><a href="index.php">Sala de Batallas Social</a></h1>
      <nav>
        <ul>
        	<li><a href="index.php" class="current">Inicio</a></li>
          <li><a href="galeria.php">Galería</a></li>
          <li><a href="eventos/eventos.php">Eventos</a></li>
          <li><a href="noticias.php">Noticias</a></li>
          <li><a href="contacts.php">Contacto</a></li>
        </ul>
      </nav>
    </div>
	</header>
  <!-- #gallery -->
  <section id="gallery">
  <ul id="navigation">
 
            <li class="home"><a href="administrador/login/login.php" title="Entrar al sistema"></a><br></li>
             <li class="youtube"><a href="http://www.youtube.com/user/saladebatallas" title="Canal Youtube - Para ver nuestros videos"></a><br></li>
            <li class="twitter"><a href="http://www.twitter.com/saladebatallas" title="Canal Twitter"></a><br></li>
             <li class="facebook"><a href="http://www.facebook.com/pages/Sala-de-batallas/145147595550135" title="Canal Facebook"></a><br></li>
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
  <!-- /#gallery -->
  <div class="main-box">
    <div class="container">
      <div class="inside">
        <div class="wrapper">
        	<!-- aside -->
          <aside>
            <h2>Noticias <span>Recientes</span></h2>
            <!-- .news -->
            <div id="contenido">
			
			<?php include('noticia.php')?>
            </div>
            <!-- /.news -->
          </aside>
          <!-- content -->
          <section id="content">
            <article>
            	<a href="http://www.mpcomunas.gob.ve/"><img src="images/comunas.png" alt="" border="0"></a>
              <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;Salas de Batalla Social es una herramienta de articulación entre el pueblo organizado y el Estado, representado por el Ministerio del Poder Popular para las Comunas y Protección Social. En este espacio confluyen Consejos Comunales, Misiones Sociales y Organizaciones Comunitarias que hacen vida en una determinada parroquia, sector o comunidad.</p>
              <figure><a href="http://www.psuv.org.ve/"><img src="images/banner1.jpg" alt=""></a></figure>
              <p align="justify">Con la creación de las Salas de Batalla Social se trata de ir sembrando el socialismo desde abajo, se trata de ir convirtiendo en realidad los valores del socialismo, el humanismo, la solidaridad, la suprema felicidad social, la plena existencia humana, se trata de llevar adelante lo que está señalado en nuestra Constitución sobre democracia participativa y protagónica….</p>
              <p align="left"><b>Hugo R. Chávez Frías.</b></p>
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
   <script type="text/javascript">
            $(function() {
                $('#navigation a').stop().animate({'marginLeft':'-85px'},1000);

                $('#navigation > li').hover(
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-2px'},200);
                    },
                    function () {
                        $('a',$(this)).stop().animate({'marginLeft':'-85px'},200);
                    }
                );
            });
        </script>
</body>
</html>
