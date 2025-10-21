<?php 
		$servername = "localhost";
		$username = "Jorge34798";
		$password = "Eslc2019";
		$database = "Jorge34798";
		
$q=$_GET["q"];
$i=$_GET["i"];
$u=$_GET["u"]; // recebe uma parâmetro por GET

	$lig= new mysqli ( $servername, $username, $password, $database) 
	or die ("Problema na ligação ao servidor MYSQL");

	$sql="delete from ListaDesejos where codigUti = $u and CodigoJogo= $q";
	$lig->query($sql) or die("2");
	echo "1";
?>
