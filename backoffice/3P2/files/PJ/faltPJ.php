<?php
$c = $_REQUEST['cod'];
$jog = $_REQUEST['jog'];
$sql = "select * from JogosPlataforma where CodigoPlataforma = $c and CodigoJogo=$jog";
$res = $lig->query($sql);
$lin = $res->fetch_array();
?>
<br>

<center>
	<h1>Alterar Jogos na Plataforma</h1><br><br>

	<form method="POST" action="index.php?cmd=PJGalt2&cod=<?php echo $c, $jog; ?>">

		<div class="col-sm-4"><b>Codigo de Plataforma</b>
			<input type="text" readonly class="form-control" id="CodigoP" name="pl" value="<?php echo $c; ?>">
		</div>

		<br>

		<div class="col-sm-4"><b>Codigo de Jogo</b>
			<input type="text" readonly class="form-control" id="CodigoJ" name="jg" value="<?php echo $jog; ?>">
		</div>

		<br>

		<div class="form-group">
			<div class="container">
				<div class='col-sm-5'><b>Data de Lançamento</b>
					<input type="date" class="form-control" id="dat" name="dat" value="<?php echo $lin['DataLanca']; ?>"></div>
			</div>
		</div>
		<br>

		<button type="submit" class="btn btn-secondary">Alterar jogo na plataforma</button>
		<button type="reset" class="btn btn-secondary">Limpar</button>
	</form>
</center>