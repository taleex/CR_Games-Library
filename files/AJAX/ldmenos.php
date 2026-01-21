<?php
require '../cone.php';
$q=$_GET["q"];
$i=$_GET["i"];
$u=$_GET["u"]; // recebe uma parâmetro por GET

	$sql="delete from ListaDesejos where codigUti = $u and CodigoJogo= $q";
	$lig->query($sql) or die("2");
	echo "1";
?>
