<?php

$RegistrosAMostrar=4;

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
require('administrador/public/gestorNoticias/clases/noticia.class.php');
$objCliente=new Noticia;
$consulta=$objCliente->paginador($RegistrosAEmpezar, $RegistrosAMostrar);

if($consulta) {
	while( $noticia = mysql_fetch_array($consulta) ){
?>

            	<li>
              	<figure><img width="60" hight="60" src="<? echo"administrador/public/gestorNoticias/imagenes/".$noticia["imagen"];?>"/></figure>
                <h3><a href="ver_new.php?id=<?php echo $noticia['id'] ?>"  class='basic' value=""><? print htmlentities(substr($noticia["titulo"],0,30)); ?></a></h3>

               <p><? echo htmlentities(substr($noticia["texto"],0,30))."..."; ?></p>


                <? };

}
?>
              </li>

            </ul>



            </body>
            </html>

            <?
//******--------determinar las páginas---------******//
$objCliente=new Noticia;
$consulta=$objCliente->muestro_datos();

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
if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\"><img border=\"0\" src=\"images/left_16.png\"></a> ";
echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\"><img border=\"0\" src=\"images/right_16.png\" ></a> ";
echo "<a onclick=\"Pagina('$PagUlt')\"><strong> &nbsp; &nbsp; >>  </strong></a>";
?>
