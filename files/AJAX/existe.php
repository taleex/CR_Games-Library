<?php
require '../cone.php';
$q=$_GET["q"]; // recebe uma parâmetro por GET
$c=$_GET["c"];

// Get current user's username
$sql="select * from Utilizadores where codUti = '$c'";
$res1=$lig->query($sql); 
$lu=$res1->fetch_array();

// If username is the same as current user's, it's available
if($lu['Login'] == $q){
    echo "Username disponível";
} else {
    // Check if username exists in database (excluding current user)
    $s="select * from Utilizadores where Login = '$q' AND codUti != '$c'";
    $res=$lig->query($s); 
    $l=$res->fetch_array();

    if($l) {
        echo "Login ocupado";
    } else {
        echo "Username disponível";
    }
}
