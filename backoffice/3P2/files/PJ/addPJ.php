<?php

if ($lig->connect_error) {
    die("Connection failed: " . $lig->connect_error);
}

	$pl=$_REQUEST['pl'];
	$jg=$_REQUEST['jg'];
	$dat=$_REQUEST['dat'];
  
  
	$sql="insert into JogosPlataforma (CodigoPlataforma,CodigoJogo,DataLanca) values ('$pl','$jg','$dat')";
	$lig->query($sql) or die("ERRO:Inserção na tabela Jogos na Plantaforma");

	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=PJGlist>";

?>
