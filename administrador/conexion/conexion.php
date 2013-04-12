<?php
function conectar()
{
	mysql_connect("localhost", "root", "0000");
	mysql_select_db("saladebatallas");
}

function desconectar()
{
	mysql_close();
}
?>
