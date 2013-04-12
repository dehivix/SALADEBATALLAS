<?php

$RegistrosAMostrar=3;

//estos valores los recibo por GET
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;

}
//secuancia logica donde muestro la noticia llamando la clase
?>
<html>
<head>
</head>
<body>

<ul class="news">
            <?
require('../administrador/public/gestorEventos/clases/evento.class.php');
$objCliente=new Evento;
$consulta=$objCliente->paginador($RegistrosAEmpezar, $RegistrosAMostrar);

if($consulta) {
	while( $eventos = mysql_fetch_array($consulta) ){
?>
<table width="402" border="0">
  <tr>
    <td width="147"><hr><strong>Nombre Del evento:</strong></td>
    <td width="245"><hr><? print htmlentities($eventos["nombre"]); ?>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Sitio:</strong></td>
    <td><? print htmlentities(substr($eventos["sitio"],0,30)); ?>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Direccion del Evento</strong></td>
    <td><? print htmlentities($eventos["direccion"]); ?>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Fecha:</strong></td>
    <td><? print htmlentities(substr($eventos["fecha"],0,30)); ?>&nbsp;</td>
  </tr>
  <tr>
  <td><strong>Informaci&oacute;n<hr></strong></td>
  <td><? print htmlentities($eventos["informacion"]); ?><hr></td>
  </tr>
</table>


                <? };

}
?>
             



</body>
            </html>

            <?
//******--------determinar las páginas---------******//
$objCliente=new Evento;
$consulta=$objCliente->mostrar_evento();

$NroRegistros=mysql_num_rows($consulta);

$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevará decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
echo "<br /><br />";
echo "<a onclick=\"Pagina('1')\"><strong> << &nbsp; &nbsp;</strong></a> ";
if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\"><img border=\"0\" src=\"../images/left_16.png\"></a> ";
echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\"><img border=\"0\" src=\"../images/right_16.png\" ></a> ";
echo "<a onclick=\"Pagina('$PagUlt')\"><strong> &nbsp; &nbsp; >>  </strong></a>";
?>