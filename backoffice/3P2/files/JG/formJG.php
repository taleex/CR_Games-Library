<center>
	<h1>Adicionar Jogo</h1><br>

	<form enctype="multipart/form-data" action="index.php?cmd=JOGins" method="post">

		<div class="form-group col-sm-4">
			<label><b>Produtores</b></label>
			<select class="form-control" name="Codigo_Produtor">
		</div>

		<?php

		if (($_SESSION['codtipoUti'] == 13)) {
			$sql = "select * from Produtores";
			$res = $lig->query($sql);
		} else {
			$sql = "select * from Produtores where Codigo_Produtor like " . $_SESSION['emp'] . "";
			$res = $lig->query($sql);
		}
		
		while ($lin = $res->fetch_array()) {
			echo "<option value=", $lin['Codigo_Produtor'], ">", $lin['Nome_Produtor'], "</option>";
		}
		echo "</select>";

		?>
		<br>

		<div class="form-group">
			<label><b>Genero</b></label>
			<select class="form-control" name="CodTipoJogo">
		</div>
		<?php

		$sql = "select * from Tipo_de_Jogo";
		$res = $lig->query($sql);
		while ($lin = $res->fetch_array()) {
			echo "<option value=", $lin['CodTipoJogo'], ">", $lin['Genero'], "</option>";
		}
		echo "</select>";
		?>
		<br>

		<div class="form-group">
			<label><b>Nome do Jogo</b></label>
			<input type="text" class="form-control" required id="Nome_Jogo" name="Nome_Jogo" placeholder="Minecraft">
		</div>


		<div class="form-group">
			<label><b>Data de Lançamento</b></label>
			<input type="date" class="form-control" id="DataLancamento" name="DataLancamento">
		</div>

		<div class="form-group">
			<label><b>Preço do Jogo</b></label>
			<input class='form-control' type="number" required min="0.00" max="10000.00" step="0.01" id="Preco" name="Preco" placeholder="0.0">
		</div>


		<div class="form-group">
			<label><b>Descrição</b></label>
			<textarea style="resize:none" class="form-control" required id="descricao" name="descricao" rows="4"></textarea>
		</div>

		<div class="form-group">
			<label>Foto de Jogo</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
			<input type="file" class="form-control" required id="imgjg" placeholder="Foto de jogo" name="img">
		</div>


		<input type="submit" class="btn btn-secondary" name="submit">
		<input type="reset" class="btn btn-secondary" name="reset" value="Limpar a area de texto">

	</form>
</center>