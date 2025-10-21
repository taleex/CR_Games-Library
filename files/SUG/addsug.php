<?php

	$CodUtil=$_SESSION['codUti'];
	$Codigo_Pr=$_REQUEST['sugPr'];
	$sug=$_REQUEST['sugN'];
	
	$sql="insert into sugestoes (CodUtil,sugesta,NomePr) values ('$CodUtil','$sug','$Codigo_Pr')";
	$lig->query($sql) or die("ERRO:Inserção na tabela sugestoes");
	
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=conta>";

?>
