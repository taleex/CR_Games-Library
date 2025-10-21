<?php

$Codigo_Plataforma=$_REQUEST['Codigo_Plataforma'];
$Nome_Plataforma=$_REQUEST['Nome_Plataforma'];

$sql="update Plataforma set Nome_Plataforma = '$Nome_Plataforma' where Codigo_Plataforma='$Codigo_Plataforma'";
$lig->query($sql) or die("ERRO: alteração da tabela Plataforma");
echo "Alteração efetuada com sucesso!";
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=PLlist>";
?>
