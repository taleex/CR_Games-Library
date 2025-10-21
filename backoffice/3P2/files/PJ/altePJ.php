<?php

$a=$_REQUEST['pl'];
$b=$_REQUEST['jg'];
$c=$_REQUEST['dat'];

$sql="update JogosPlataforma set DataLanca='$c' where CodigoPlataforma='$a' and  CodigoJogo= '$b'";
$lig->query($sql) or die("ERRO: alteração da tabela Jogos na Plantaforma");
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=PJGlist>";
