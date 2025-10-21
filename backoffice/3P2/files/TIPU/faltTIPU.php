<?php
$c = $_REQUEST['cod'];
$sql = "select * from Tipo_de_utilizador where codtipoUti = $c";
$res = $lig->query($sql);
$lin = $res->fetch_array();
?>
<br>

<center>
	<h1>Alterar Tipo de Utilizadores</h1><br><br>

	<form class="form-horizontal" method="POST" action="index.php?cmd=TIPUalt2&cod=<?php echo $c; ?>">

		<div class="form-group col-sm-4">
			<label class="control-label" for="Codigo"><b>Código de tipo de Utilizador</b></label>
			<input type="text" readonly class="form-control" id="Codigo" name="codtipoUti" value="<?php echo $c; ?>">
		</div>

		<div class="form-group col-sm-4">
			<label class="control-label" for="Designacao"><b>Designação de Tipo de Utilizador</b></label>
			<input type="text" class="form-control" id="Designacao" name="dsg" value="<?php echo $lin['dsg']; ?>">
		</div>

		<div class="form-group col-sm-10">
			<button type="submit" class="btn btn-secondary">Modificar tipo de Utilizador</button>
		</div>

	</form>
</center>