<?php

if ($lig->connect_error) {
    die("Connection failed: " . $lig->connect_error);
}

	$Codigo_Produtor=$_REQUEST['Codigo_Produtor'];
	$Nome_Produtor=$_REQUEST['Nome_Produtor'];
  
	$sql="insert into Produtores (Codigo_Produtor,Nome_Produtor) values ('$Codigo_Produtor','$Nome_Produtor')";
	$lig->query($sql) or die("ERRO:Inserção na tabela tipos de Produtores");

	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=PROElist>";

?>
