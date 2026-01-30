<?php
require '../cone.php';
$q=$_GET["m"]; // recebe uma parâmetro por GET

// For registration, simply check if email exists in database
$s="select * from Utilizadores where email = '$q'";
$res=$lig->query($s); 
$l=$res->fetch_array();

if($l) {
    echo "email já se encontra registado no sistema";
} else {
    echo "Email disponível";
}
?>