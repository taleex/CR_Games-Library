<?php
$c = $_REQUEST['cod'];
if (($_SESSION['codtipoUti'] == 13) || ($_SESSION['codtipoUti'] == 12)) {
	$sql = "select * from Jogos where Codigo_Jogo = $c";
	$res = $lig->query($sql);
	$lin = $res->fetch_array();

	$JGbg = $lin['JGbg'];
	$IMGjg = $lin['IMGjg'];

	unlink($IMGjg);
	unlink($JGbg);

	$sql1 = "delete from Jogos where Codigo_Jogo = $c";
	if (!$lig->query($sql1)) {
		echo "Erro delete na tabela Jogos<br>";
		echo "Numero erro:", $lig->errno, "<br>";
		echo "Descrição erro:", $lig->error;
	} else {
		echo "Registo eliminado";
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=JOGlist>";
	}
} else {
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
}
