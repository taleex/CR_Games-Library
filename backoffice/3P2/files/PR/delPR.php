<?php
if ($_SESSION['codtipoUti'] == 13) {
	$c = $_REQUEST['cod'];
	$sql = "delete from Produtores where Codigo_Produtor = $c";
	if (!$lig->query($sql)) {
		echo "Erro delete na tabela Produtores<br>";
		echo "Numero erro:", $lig->errno, "<br>";
		echo "Descrição erro:", $lig->error;
	} else {
		echo "Registo eliminado";
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=PROElist>";
	}
} else {
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
}
