<?php

$a = $_REQUEST['a'];

if ($a != '1') {
	$n = $_REQUEST['n'];
	$p = $_REQUEST['p'];
	$t = $_REQUEST['t'];
	

	$sql = "select * from Jogos where Nome_Jogo = '$n' and Codigo_Produtor = '$p' and CodTipoJogo = '$t'";
	$res = $lig->query($sql);
	$lin5 = $res->fetch_array();

	$c = $lin5['Codigo_Jogo'];
} else {
	$c = $_REQUEST['cod'];
	$sql = "select * from Jogos where Codigo_Jogo = '$c'";
	$res = $lig->query($sql);
	$lin5 = $res->fetch_array();
	$n = $lin5['Nome_Jogo'];
}
?>

<br><br>
<center>
	<h1>Imagem de background do Jogo</h1><br>
	<form enctype="multipart/form-data" action="index.php?cmd=BG&cod=<?php echo $c; ?>&n=<?php echo $n; ?>&a=<?php echo $a; ?>" method="post">

		<div class="form-group col-sm-4">
			<label><b>Foto de Jogo</b></label>
			<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
			<input type="file" class="form-control" id="imgjg" placeholder="Foto de jogo" name="img">
		</div>
		</div>

		<input type="submit" class="btn btn-secondary" name="submit">
		<input type="reset" class="btn btn-secondary" name="reset" value="Limpar a area de texto">
	</form>
</center>