<?php
$c = $_REQUEST['cod'];
$j = $_REQUEST['j'];
if (($_SESSION['codtipoUti'] == 13) || ($_SESSION['codUti'] == $c)) {

	if ($_SESSION['codUti'] == $c) {
		$sql = "delete from ListaDesejos where codigUti = $c and CodigoJogo= $j";
		if (!$lig->query($sql)) {
			echo "Erro delete na tabela tipo de ListaDesejos<br>";
			echo "Numero erro:", $lig->errno, "<br>";
			echo "Descrição erro:", $lig->error;
		} else {
			echo "Registo eliminado";
			echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=LDlist>";
		}
	}
} else {
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
}
