<?php
require '../cone.php';
$q=$_GET["q"]; // recebe uma parâmetro por GET

$s="select * from Utilizadores where Login = '$q'";
$res=$lig->query($s); 
$l=$res->fetch_array();

if($l)
echo "Login ocupado";
