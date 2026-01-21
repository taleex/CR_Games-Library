<?php
require '../cone.php';
$q=$_GET["q"]; // recebe uma parâmetro por GET
$c=$_GET["c"];


$sql="select * from Utilizadores where codUti = '$c'";
$res1=$lig->query($sql); 
$lu=$res1->fetch_array();

if($lu['Login'] != $q){

$s="select * from Utilizadores where Login = '$q'";
$res=$lig->query($s); 
$l=$res->fetch_array();

if($l)
echo "Login ocupado";
}
