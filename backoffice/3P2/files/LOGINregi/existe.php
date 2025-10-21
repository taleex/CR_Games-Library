<?php
		$servername = "localhost";
		$username = "Jorge34798";
		$password = "Eslc2019";
		$database = "Jorge34798";
		
$q=$_GET["q"]; // recebe uma parâmetro por GET
$lig= new mysqli ( $servername, $username, $password, $database); 
$s="select * from Utilizadores where Login = '$q'";
$res=$lig->query($s); 
$l=$res->fetch_array();
if($l)
echo "Login ocupado";
?>
