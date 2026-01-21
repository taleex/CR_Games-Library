<?php
require '../cone.php';
$q=$_GET["m"]; // recebe uma parâmetro por GET
$s="select * from Utilizadores where email = '$q'";
$res=$lig->query($s); 
$l=$res->fetch_array();

if($l)
echo "email já se encontra registado no sistema";
?>
