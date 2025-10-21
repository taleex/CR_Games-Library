<?php

$tuc = $_REQUEST['cod'];
$Tuds = $_REQUEST['dsg'];

$sql = "update Tipo_de_utilizador set dsg = '$Tuds' where codtipoUti ='$tuc'";
$lig->query($sql) or die("ERRO: alteração da tabela tipo de Utilizador");
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=TIPUlist>";
