<?
if(isset($_POST['enviar'])){
	
	require('administrador/public/gestorEmail/clases/email.class.php');

	$name = htmlspecialchars(trim($_POST['nombre']));
	$email = htmlspecialchars(trim($_POST['email']));
	$asunto = htmlspecialchars(trim($_POST['asunto']));
	$mensaje = htmlspecialchars(trim($_POST['mensaje']));


		
	$objCliente=new Email;
	if ( $objCliente->insertar(array($id,$name,$email,$asunto,$mensaje)) == true){
		?>
        
		<script>
  		alert('Gracias. Su Mensaje fue Enviado Correctamente.');
  		window.location='index.php';

 		</script>
		<?
	}else{
		?>
        <script>
  		alert('Se Produjo un Error. Intente mas Tarde.');
  		window.location='contacts.php';

 		</script>
        <?
	} 
}

	

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" type="image/x-icon" href="administrador/images/favicon/logo.ico">
  <title>Gobierno Bolivariano de Venezuela - Sala de batallas</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/Humanst521_BT_400.font.js"></script>
  <script type="text/javascript" src="js/Humanst521_Lt_BT_400.font.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
	<script type="text/javascript" src="js/roundabout.js"></script>
  <script type="text/javascript" src="js/roundabout_shapes.js"></script>
  <script type="text/javascript" src="js/gallery_init.js"></script>
	<script type="text/javascript" src="js/validacion.js"></script>
  <!--[if lt IE 7]>
  	<link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="all">
  <![endif]-->
  <!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
    <script type="text/javascript" src="js/IE9.js"></script>
  <![endif]-->
  
 <!-- <script type="text/javascript" src="from/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="from/jquery.validate.js"></script>
<script type="text/javascript" src="from/jquery.form.js"></script>
<script type="text/javascript" src="from/ajax_form_setup.js"></script>-->
  
</head>

<body>
  <!-- header -->
    <header>
    <div class="container">
    	<h1><a href="index.php">Sala de Batallas Social</a></h1>
      <nav>
        <ul>
        	<li><a href="index.php" >Inicio</a></li>
          <li><a href="galeria.php">Galería</a></li>
          <li><a href="eventos/eventos.php">Eventos</a></li>
          <li><a href="noticias.php">Noticias</a></li>
          <li><a href="contacts.php" class="current">Contacto</a></li>
        </ul>
      </nav>
    </div>
	</header>
  <!-- #gallery -->
   <section id="gallery">
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
                    
                    <h2 aling="center">Conta<span>ctanos</span></h2>
<marquee class="" direction="up" scrolldelay="10" scrollamount="1" onMouseOver="this.stop()" onMouseOut="this.start()">
	    <h2>Acerca<span>de Sala de batallas</span></h2>
            <div class="img-box">
            	<figure><img src="images/logo.png" alt=""></figure>
			
		<p align="justify">Garantizar la construcci&oacute;n de los espacios de articulaci&oacute;n y vinculaci&oacute;n entre los consejos comunales, movimientos 			sociales, ciudadanos (as) y las Instituciones del Ministerio del Poder Popular para las Comunas y Protecci&oacute;n social. Se encuentra 			adscrita al Despacho del Viceministerio de Participaci&oacute;n del Poder Comunal.</p>
            </div>
            <p align="justify">"Con la creaci&oacute;n de las Salas de Batalla Social se trata de ir sembrando el socialismo desde abajo, se trata de ir convirtiendo en realidad los valores del socialismo, el humanismo, la solidaridad, la suprema felicidad social, la plena existencia humana, se trata de llevar adelante lo que est&aacute; señalado en nuestra Constituci&oacute;n sobre democracia participativa y protag&oacute;nica…."</p> 
                                                    <p><b><i>Hugo R. Ch&aacute;vez Frías.</i></b></p>
</marquee>
          </aside>
          <!-- content -->
          <section id="content">
            <article>
            	<h2>Sala d<span>e Batallas</span></h2>
              <form id="" name="ajax_form" action="contacts.php" method="post" onSubmit="return validar(this)">
                <fieldset>
                  <div class="field">
                    <p><label>Nombre:</label>
                    &nbsp;<input name="nombre" class="required text" type="text" id="nombre" size="30" value=""/>
                    </p>
                  </div>
		<div class="field">
                   <p> <label>E-mail:</label>
	              &nbsp;&nbsp;&nbsp;<input name="email" class="required email text" type="email" id="correo" size="30" value=""/></p>
		</div>
                  <div class="field">
                   <p> <label>Asunto:</label>
                    &nbsp;
                    <input name="asunto" class="required text" type="text" id="asunto" size="30" value=""/>
                   </p>
                  </div>

                  <div class="field">
                    <p><label>Mensaje:</label>
                    <textarea cols="40" name="mensaje" class="required" rows="8" id="mensaje"></textarea></p>
                  </div>
                  
			<div> <input name="enviar" type="submit" value="Enviar"></div>
                </fieldset>
              </form>
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
