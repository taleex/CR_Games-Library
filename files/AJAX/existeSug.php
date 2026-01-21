<?php
require '../cone.php';
$q=$_GET["q"]; // recebe uma parâmetro por GET
$s="select * from sugestoes where sugesta = '$q'";
$res=$lig->query($s); 
$l=$res->fetch_array();
if($l)
echo "Já sugiram esse jogo, aguarde ate que seja adicionado";
?>
