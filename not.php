<?php

	if(isset($_GET['id'])){
		
		require('administrador/public/gestorNoticias/clases/noticia.class.php');
		$objCliente=new Noticia;
		$consulta = $objCliente->mostrar_noticia($_GET['id']);
		$noticia = mysql_fetch_array($consulta);
	?>
	<figure><img width="59" height="59" src="<? echo"administrador/public/gestorNoticias/imagenes/".$noticia["imagen"];?>"/></figure>
	<h3><a href="not.php?id=<?php echo $noticia['id'] ?>"  class='basic' value=""><? print htmlentities($noticia["titulo"]); ?></a></h3>
        <p><? echo $noticia["texto"]; ?></p>	

	<?php
	}

?>
