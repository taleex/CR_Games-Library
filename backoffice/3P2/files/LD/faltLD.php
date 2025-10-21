<?php

$c = $_REQUEST['cod'];
$sql = "select * FROM  ListaDesejos,Jogos,Utilizadores where Codigo_Jogo=CodigoJogo and codigUti=codUti and codigUti = $c";
$res = $lig->query($sql);
$lin = $res->fetch_array();
?>
<br>

<center>
	<h1>Alterar Tipo de Lista de Desejos</h1><br><br>

	<form class="form-horizontal" method="POST" action="index.php?cmd=altLD2&cod=<?php echo $c; ?>">

		<div class="form-group">
			<center><b>Código Utilizador</b></center>
			<div class="col-sm-4">
				<input type="text" readonly class="form-control" id="Codigo" name="codUti" value="<?php echo $c; ?>">
			</div>
		</div>


		<div class="form-group"><b>Nome do Jogo</b>
			<div class="col-sm-4">
				<select class="form-control" name="Codigo_Jogo"></div>
		</div>

		<?php
		$sql = "select * from Jogos";
		$res = $lig->query($sql);
		while ($lin2 = $res->fetch_array()) {
			if ($lin['Codigo_Jogo'] == $lin2['Codigo_Jogo'])
				echo "<option value=", $lin2['Codigo_Jogo'], " selected='selected'>", $lin2['Nome_Jogo'], "</option>";
			else
				echo "<option value=", $lin2['Codigo_Jogo'], ">", $lin2['Nome_Jogo'], "</option>";
			}
		echo "</select>";
		?>
		<br>

		<button type="submit" class="btn btn-secondary">modificar a lista de desejos</button>
		<button type="reset" class="btn btn-secondary">Limpar</button>

	</form>
</center>