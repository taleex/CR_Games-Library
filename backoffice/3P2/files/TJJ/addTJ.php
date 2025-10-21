<?php

if ($lig->connect_error) {
    die("Connection failed: " . $lig->connect_error);
}

	$CodTipoJogo=$_REQUEST['CodTipoJogo'];
	$Genero=$_REQUEST['Genero'];
  
	$sql="insert into Tipo_de_Jogo (CodTipoJogo,Genero) values ('$CodTipoJogo','$Genero')";
	$lig->query($sql) or die("ERRO:Inserção na tabela tipos de Jogos");

	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=TJlist>";

?>
