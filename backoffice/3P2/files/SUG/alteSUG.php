<?php

$c=$_REQUEST['cod'];
$u=$_REQUEST['u'];
$suges=$_REQUEST['suges'];
$pr=$_REQUEST['pr'];

$sql="update sugestoes set sugesta = '$suges', NomePr= '$pr' where Codigo_Sugestao='$c' and CodUtil = '$u'";
$lig->query($sql) or die("ERRO: alteração da tabela sugestoes");
echo "Alteração efetuada com sucesso!";
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=SUGlist>";
?>
