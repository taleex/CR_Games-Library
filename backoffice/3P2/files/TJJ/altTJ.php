<?php

$CodTipoJogo=$_REQUEST['CodTipoJogo'];
$Genero=$_REQUEST['Genero'];

$sql="update Tipo_de_Jogo set Genero = '$Genero' where CodTipoJogo ='$CodTipoJogo'";
$lig->query($sql) or die("ERRO: alteração da tabela tipo de Jogos");
echo "Alteração efetuada com sucesso!";
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=TJlist>";
?>
