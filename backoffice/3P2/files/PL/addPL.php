<?php

if ($lig->connect_error) {
    die("Connection failed: " . $lig->connect_error);
}

	$Codigo_Plataforma=$_REQUEST['Codigo_Plataforma'];
	$Nome_Plataforma=$_REQUEST['Nome_Plataforma'];

	$sql="insert into Plataforma (Codigo_Plataforma,Nome_Plataforma) values ('$Codigo_Plataforma','$Nome_Plataforma')";
	$lig->query($sql) or die("ERRO:Inserção na tabela Plataforma");

	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=PLlist>";

?>
