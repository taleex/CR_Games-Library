<?php
require '../cone.php';
$q=$_GET["q"];
$i=$_GET["i"];
$u=$_GET["u"]; // recebe uma parâmetro por GET

$sql="insert into ListaDesejos (CodigoJogo,codigUti) values ('$q','$u')";
	$lig->query($sql) or die("2");
	echo "1";
?>
