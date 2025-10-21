<?php
if ($_SESSION['codtipoUti'] == 13) {
	$c = $_REQUEST['cod'];
	$u = $_REQUEST['u'];
	$sql = "delete from sugestoes where Codigo_Sugestao = $c and CodUtil = $u";
	if (!$lig->query($sql)) {
		echo "Erro delete na tabela sugestoes<br>";
		echo "Numero erro:", $lig->errno, "<br>";
		echo "Descrição erro:", $lig->error;
	} else {
		echo "Registo eliminado";
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=SUGlist>";
	}
} else {
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
}
