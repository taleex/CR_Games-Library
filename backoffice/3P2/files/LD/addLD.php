<?php

if ($lig->connect_error) {
    die("Connection failed: " . $lig->connect_error);
}

	$Codigo_Jogo=$_REQUEST['Codigo_Jogo'];
	$codUti=$_REQUEST['codUti'];
  
	$sql="insert into ListaDesejos (CodigoJogo,codigUti) values ('$Codigo_Jogo','$codUti')";
	$lig->query($sql) or die("ERRO:Inserção na tabela tipos de Lista de desejos");
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=LDlist>";

?>
