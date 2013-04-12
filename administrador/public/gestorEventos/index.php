<?
error_reporting(0);
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
if(isset($_POST['save'])){
	
	require('clases/evento.class.php');
	

	$id = htmlspecialchars(trim($_POST['id']));
	$fecha = htmlspecialchars(trim($_POST['fecha']));
	$hora = htmlspecialchars(trim($_POST['hora']));
	$nombre = htmlspecialchars(trim($_POST['nombre']));
	$sitio = htmlspecialchars(trim($_POST['sitio']));
	$direccion = htmlspecialchars(trim($_POST['direccion']));
	$informacion = htmlspecialchars(trim($_POST['informacion']));
	
	if(empty($_POST['fecha']) || empty($_POST['fecha']) || empty($_POST['nombre']) || empty($_POST['sitio']) || empty($_POST['direccion']) || empty($_POST['informacion'])){
		$infor= "<div class=\"info mensajes\">Campos Vacios</div>";
		
		
	}else{
	$objCliente=new Evento;
	if ( $objCliente->insertar(array($id,$fecha,$hora,$nombre,$sitio,$direccion,$informacion)) == true){
		header("location:../index.php");
		
	}else{
		$error = "<div class=\"error mensajes\">Se produjo un Error</div>";
	} 
	}
}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" dir="ltr" id="minwidth" >
<head>
 <link rel="shortcut icon" type="image/x-icon" href="../../images/favicon/logo.ico">
  <title>Sala de batallas Social- Gestor de Noticias</title>
    
<link href="../../css/template.css" rel="stylesheet" type="text/css" />
<link href="../../css/menuv.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../../css/rounded.css" />
<link rel="stylesheet" type="text/css" href="../../css/style1.css" />
<link rel="stylesheet" type="text/css" href="css/form.css" />

	<script type="text/javascript" src="../../js/menu.js"></script>
	<script type="text/javascript" src="../../js/index.js"></script>
        <script src="../../js/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="../../js/jquery.tooltip.js" type="text/javascript"></script>
<script src="../../js/datepicker.js" type="text/javascript"></script>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script src="js/jquery.tooltip.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="../../css/demo.css" />
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
<style type="text/css" id="easterStyle">
</style>
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



#minwidth body #content-box .border .padding #element-box .m #CollapsiblePanel1 .CollapsiblePanelTab strong {
	font-size: 12px;
}
</style>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
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
    <li><a href="index.php" class="top_link">Gestor de Eventos</a></li>
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
								<p class="b"><strong>Eventos</strong></p>
                                <center>
<form  name="form1" method="post" action="<? echo $PHP_SELF; ?>">
  <table width="715" border="0" >
    <tr>
      <td width="179" bordercolor="#333366">Cuando</td>
      <td width="526"><span class="datebox">
        <p class="lastup">
<input type="text" class="w8em format-y-m-d divider-dash highlight-days-12 range-low-today" id="dp-1"  name="fecha" value="" maxlength="10" readonly/></p>
        <span class="datebox"><span class="phs">
        <select  name="hora" id="hora">
          <option value="0">0:00</option>
          <option value="30">0:30</option>
          <option value="60">1:00</option>
          <option value="90">1:30</option>
          <option value="120">2:00</option>
          <option value="150">2:30</option>
          <option value="180">3:00</option>
          <option selected="selected" value="210">3:30</option>
          <option value="240">4:00</option>
          <option value="270">4:30</option>
          <option value="300">5:00</option>
          <option value="330">5:30</option>
          <option value="360">6:00</option>
          <option value="390">6:30</option>
          <option value="420">7:00</option>
          <option value="450">7:30</option>
          <option value="480">8:00</option>
          <option value="510">8:30</option>
          <option value="540">9:00</option>
          <option value="570">9:30</option>
          <option value="600">10:00</option>
          <option value="630">10:30</option>
          <option value="660">11:00</option>
          <option value="690">11:30</option>
          <option value="720">12:00</option>
          <option value="750">12:30</option>
          <option value="780">13:00</option>
          <option value="810">13:30</option>
          <option value="840">14:00</option>
          <option value="870">14:30</option>
          <option value="900">15:00</option>
          <option value="930">15:30</option>
          <option value="960">16:00</option>
          <option value="990">16:30</option>
          <option value="1020">17:00</option>
          <option value="1050">17:30</option>
          <option value="1080">18:00</option>
          <option value="1110">18:30</option>
          <option value="1140">19:00</option>
          <option value="1170">19:30</option>
          <option value="1200">20:00</option>
          <option value="1230">20:30</option>
          <option value="1260">21:00</option>
          <option value="1290">21:30</option>
          <option value="1320">22:00</option>
          <option value="1350">22:30</option>
          <option value="1380">23:00</option>
          <option value="1410">23:30</option>
        </select>
        </span></span></td>
    </tr>
    <tr>
      <td>Que estas planificando?</td>
      <td><span class="data">
        <input type="text" name="nombre" id="nombre" class="inputtext" />
      </span></td>
    </tr>
    <tr>
      <td> Donde?</td>
      <td><span class="wrap">
        <input type="text" spellcheck="false"    name="sitio" id="sitio"  />
      </span></td>
    </tr>
    <tr>
      <td>Direcci&oacute;n</td>
      <td><span class="data">
        <input type="text" name="direccion" value="" class="inputtext" id="direccion" />
      </span></td>
    </tr>
    <tr>
      <td>Mas Informaci&oacute;n</td>
      <td><span class="data">
        <textarea  name="informacion" rows="2" id="informacion"></textarea>
        <script type="text/javascript">
	elasticTextArea("informacion");
</script>
      </span></td>
    </tr>
    <tr>
    <td></td>
    <td>
     &nbsp; <input type="submit" id="signin_submit" name="save" value="Crear evento" title="Crear Nueva Evento" />
    
    </td>
    </tr>
  </table>
  <?php echo $infor; ?>
  <?php echo $error; ?>

 
</form>
</center>
            
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
                  <div class="m" >
                    <div id="CollapsiblePanel1" class="CollapsiblePanel">
                      <div class="CollapsiblePanelTab" tabindex="0"><img src="Free-Database-Add-icon.png" width="32" height="32" border="0" /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver eventos</strong></div>
                      <div class="CollapsiblePanelContent"><?php include('consulta.php') ?></div>
                    </div>
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
<script type="text/javascript">
<!--
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
//-->
    </script>
</body>
</html>
<?php


?>
