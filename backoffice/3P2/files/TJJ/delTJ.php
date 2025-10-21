<?php
	if (($_SESSION['codtipoUti'] == 13) || ($_SESSION['codtipoUti'] == 12)) {
	$c=$_REQUEST['cod'];
	$sql="delete from Tipo_de_Jogo where CodTipoJogo = $c";
	if(!$lig->query($sql)) {
		echo "Erro delete na tabela tipo de Jogos<br>";
		echo "Numero erro:", $lig->errno, "<br>";
		echo "Descrição erro:", $lig->error;

	}
	else {
		echo "Registo eliminado";
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=TJlist>";
	}
}
else{
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
}
