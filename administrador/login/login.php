<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="shortcut icon" type="image/x-icon" href="../images/favicon/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::Bloqueado | Identifiquese::</title>
<link rel="stylesheet" type="text/css" href="../css/login.css" />
<script src="../js/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="../js/jquery.tooltip.js" type="text/javascript"></script>
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
<script language=JavaScript>

<!--

function inhabilitar(){
	
    alert ("Esta función está Desabilitada.")
    return false
}

document.oncontextmenu=inhabilitar

// -->
</script>
</head>

<body bgcolor="#1C1C1C">

<center>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<fieldset>


  <table border="0" align="center"  >

<tr>	<!--encabezado-->

	
    <td valign="bottom">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../../index.php" title="Regresar "><img src="input/login_icon.jpg" width="111" height="89" border="0" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <h3><p class="panell">Acceso al Sistema</p></h3>
     </td>
    
</tr>

<tr>	<!--formulario de contenido-->
  <td colspan="2" align="center">
    
    
    <table border="0">
      <tr>
        <!--para el form de acceso de usuarios-->
        <td width="424" align="left" valign="middle">
          
          <FORM id="regForm" action="entrar.php"  name="frmEntrada" method="post">
            
            <table border="0" cellpadding="0" cellspacing="10" class="contenido" width="345">
              <tr>
                <td width="108" valign="top" align="right"><b></b>&nbsp;&nbsp;</td>
                <td width="207" valign="top" align="left" > <input class="usuario0" onmouseover="this.className='usuario1'" onmouseout="this.className='usuario2';"  name="usuario" size='10'   onfocus="if(this.value=='Usuario') this.value='';" onblur="if(this.value=='') this.value='Usuario';" value="Usuario"></td>
                </tr>
              <tr>
                <td width="108" valign="top" align="right"><b>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</b>&nbsp;&nbsp;</td>
                <td width="207" valign="top" align="left" > <input type="password" class="password0" onmouseover="this.className='password1'" onmouseout="this.className='password2';" name="clave" size='10'   onfocus="if(this.value=='Contrasena') this.value='';" onblur="if(this.value=='') this.value='Contrasena';" value="Contrasena"></td>
                
                </tr>
              <tr>
                <td colspan="2" align="right"><input type="image" src="input/aceptar.png" value="Enviar" name="boton"/>         
                </td></tr>
               
              </table>
              
            </form>
          
          
          </td>
        
        
          </tr>
      
      </table>
    
  </td>
</tr>
</table>

</fieldset>
</center>
</body>
</html>
