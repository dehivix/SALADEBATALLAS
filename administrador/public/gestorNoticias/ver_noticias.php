<html>
<head>
<link href="estilo/estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?
require('clases/noticia.class.php');
$objCliente=new Noticia;
$consulta=$objCliente->mostrar_noticias();

if($consulta) {
	while( $noticia = mysql_fetch_array($consulta) ){
?>
<div id="listing">
<div id="img_cont_1">
<div id="image_left">
<img width="80" height="123" src="<? echo"imagenes/".$noticia["imagen"];?>"/>
</div>
</div>
<h1><? print htmlentities($noticia["titulo"]); ?></h1>
<p>><? echo substr($noticia["texto"],0,50)."..."; ?></p>
<? };

}
?>
</div>
</body>
</html>
<?
/*
require('clases/noticia.class.php');
$objCliente=new Noticia;
$consulta=$objCliente->mostrar_noticia();


while($row=mysql_fetch_array($resultado))
{
echo"imagenes/".$row["imagen"];
print(htmlentities($row["titulo"])."<BR>");
print(htmlentities($row["texto"])."<BR>");
}
*/
?>