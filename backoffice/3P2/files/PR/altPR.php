<?php

$Codigo_Produtor=$_REQUEST['cod'];
$Nome_Produtor=$_REQUEST['Nome_Produtor'];

$sql="update Produtores set Nome_Produtor = '$Nome_Produtor' where Codigo_Produtor ='$Codigo_Produtor'";
$lig->query($sql) or die("ERRO: alteração da tabela Produtores");
echo "Alteração efetuada com sucesso!";
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=PROElist>";
?>
