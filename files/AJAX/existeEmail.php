<?php
$servername = "sql100.infinityfree.com";
	$username = "if0_40948955";
	$password = "zBHdSjgr60";
	$database = "if0_40948955_gameslibrary";
		

$q=$_GET["m"]; // recebe uma parâmetro por GET
$lig= new mysqli ( $servername, $username, $password, $database); 
$s="select * from Utilizadores where email = '$q'";
$res=$lig->query($s); 
$l=$res->fetch_array();

if($l)
echo "email já se encontra registado no sistema";
?>