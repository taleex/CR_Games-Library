<?php 
$servername = "sql100.infinityfree.com";
	$username = "if0_40948955";
	$password = "zBHdSjgr60";
	$database = "if0_40948955_gameslibrary";
		
$q=$_GET["q"];
$i=$_GET["i"];
$u=$_GET["u"]; // recebe uma parâmetro por GET


$lig= new mysqli ( $servername, $username, $password, $database);

$sql="insert into ListaDesejos (CodigoJogo,codigUti) values ('$q','$u')";
	$lig->query($sql) or die("2");
	echo "1";
?>

