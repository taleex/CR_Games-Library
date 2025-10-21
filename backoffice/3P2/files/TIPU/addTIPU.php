<?php

$tjcod = $_REQUEST['codtipoUti'];
$dsg = $_REQUEST['dsg'];

$sql = "insert into Tipo_de_utilizador (codtipoUti,dsg) values ('$tjcod','$dsg')";
$lig->query($sql) or die("ERRO:Inserção na tabela tipos de utilizadores");

echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=TIPUlist>";
