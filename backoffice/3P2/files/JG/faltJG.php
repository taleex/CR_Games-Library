<?php
$c = $_REQUEST['cod'];
$sql = "select * from Jogos where Codigo_Jogo = $c";
$res = $lig->query($sql);
$lin = $res->fetch_array();
?>

<br>
<center>
	<h1>Alterar Jogo</h1><br>

	<form enctype="multipart/form-data" method="POST" action="index.php?cmd=altJOG2&cod=<?php echo $c; ?>">

		<div class="form-group">
			<div class="col-sm-4"><b>Produtores</b>
				<select class="form-control" name="Codigo_Produtor">
					<?php
					$sql2 = "select * from Produtores";
					$res2 = $lig->query($sql2);
					while ($lin2 = $res2->fetch_array()) {
						if ($lin['Codigo_Produtor'] == $lin2['Codigo_Produtor'])
							echo "<option value=", $lin2['Codigo_Produtor'], " selected='selected'>", $lin2['Nome_Produtor'], "</option>";
						else
							echo "<option value=", $lin2['Codigo_Produtor'], ">", $lin2['Nome_Produtor'], "</option>";
					}
					echo "</select>";
					?> </div>
		</div>

		<div class="form-group">
			<div class="col-sm-4"><b>Genero</b>
				<select class="form-control" name="CodTipoJogo">

					<?php
					$sql3 = "select * from Tipo_de_Jogo";
					$res3 = $lig->query($sql3);
					while ($lin3 = $res3->fetch_array()) {
						if ($lin['CodTipoJogo'] == $lin3['CodTipoJogo'])
							echo "<option value=", $lin3['CodTipoJogo'], " selected='selected'>", $lin3['Genero'], "</option>";
						else
							echo "<option value=", $lin3['CodTipoJogo'], ">", $lin3['Genero'], "</option>";
					}
					echo "</select>";
					?> </div>
		</div>

		<div class="form-group">
			<div class="col-sm-4">
				<label for="formGroupExampleInput"><b>Nome do Jogo</b></label>
				<input type="text" class="form-control" id="Nome_Jogo" name="Nome_Jogo" value="<?php echo $lin['Nome_Jogo']; ?>">
			</div>
		</div>

		<div class="form-group">
			<div class='col-sm-4'><b>Data de Lançamento</b>
				<input type="date" class="form-control" id="DataLancamento" name="DataLancamento" value="<?php echo $lin['DataLancamento']; ?>"></div>
		</div>

		<div class="form-group">
			<b>Preço do Jogo</b><br>
			<input class='col-sm-3' type="number" min="0.00" max="10000.00" step="0.01" id="Preco" name="Preco" value="<?php echo $lin['Preco']; ?>">
		</div>

		<div class="form-group">
			<div class='col-sm-4'>
				<!--height width -->
				<label for="exampleFormControlTextarea1"><b>Descrição</b></label>
				<input style="resize:none" type="text" class="form-control" id="descricao" name="descricao" rows="4" value="<?php echo $lin['descricao']; ?>">
			</div>
		</div>

		<div class="col-sm-4">
			<div class="form-group">
				<label>Foto de Jogo</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
				<input type="file" class="form-control" id="imgjg" placeholder="Foto de jogo" name="img">
			</div>
		</div>

		<input type="submit" class="btn btn-secondary" name="submit">
		<input type="reset" class="btn btn-secondary" name="reset" value="Limpar a area de texto">

	</form>
</center>