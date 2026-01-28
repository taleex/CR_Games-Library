<?php
require '../cone.php';
$q=$_GET["m"]; // recebe uma parâmetro por GET
$c=$_GET["c"]; // recebe o código do utilizador

// Get current user's email
$sql="select * from Utilizadores where codUti = '$c'";
$res1=$lig->query($sql); 
$lu=$res1->fetch_array();

// If email is the same as current user's, it's available
if($lu['email'] == $q){
    echo "Email disponível";
} else {
    // Check if email exists in database (excluding current user)
    $s="select * from Utilizadores where email = '$q' AND codUti != '$c'";
    $res=$lig->query($s); 
    $l=$res->fetch_array();

    if($l) {
        echo "email já se encontra registado no sistema";
    } else {
        echo "Email disponível";
    }
}
