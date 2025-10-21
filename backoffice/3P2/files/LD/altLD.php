<?php

$cd=$_REQUEST['codUti'];
$jg=$_REQUEST['Codigo_Jogo'];


$sql="update ListaDesejos set CodigoJogo = '$jg' where codigUti ='$cd'";
$lig->query($sql) or die("ERRO: alteração da tabela Lista de Desejos");
echo "Alteração efetuada com sucesso!";
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=LDlist>";
?>
