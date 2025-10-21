	<?php
	$c = $_REQUEST['cod'];
	$sql = "select Utilizadores.*,Tipo_de_utilizador.*,Produtores.* from Utilizadores,Tipo_de_utilizador,Produtores where Utilizadores.codtipoUti=Tipo_de_utilizador.codtipoUti and Codigo_Produtor=empresa and codUti = $c";
	$res = $lig->query($sql);
	$lin = $res->fetch_array();
	?>

	<br>
	<center>
		<h1>Alterar Utilizador</h1>
		<br>

		<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="index.php?cmd=UTIalt2&cod=<?php echo $c; ?>">
			<div class="form-group col-sm-4">
				<label>Código de Utilizador</label>
				<input type="text" readonly class="form-control" id="Codigo" name="codUti" value="<?php echo $c; ?>">
			</div>

			<div class="form-group col-sm-4">
				<label><b>Tipo de utilizador</b></label>
				<select class="form-control tipu" required name="tipu" value="<?php echo $lin['codtipoUti']; ?>">
			</div>

			<?php
			$sql1 = "select * from Tipo_de_utilizador";
			$res1 = $lig->query($sql1);
			while ($lin1 = $res1->fetch_array()) {
				if ($lin['codtipoUti'] == $lin1['codtipoUti'])
					echo "<option value=", $lin1['codtipoUti'], " selected='selected'>", $lin1['dsg'], "</option>";
				else
					echo "<option value=", $lin1['codtipoUti'], ">", $lin1['dsg'], "</option>";
			}
			echo "</select>";
			?>

			<div class="form-group col-sm-13">
				<label><b>Login</b></label>
				<input type="text" class="form-control" id="utiLog" name="utiLog" required value="<?php echo $lin['Login']; ?>">
			</div>

			<div class="form-group col-sm-13">
				<label><b>Nome do Utilizador</b></label>
				<input type="text" class="form-control" id="utinome" name="utinome" required value="<?php echo $lin['Nome_Utilizador']; ?>">
			</div>

			<div class="form-group col-sm-13">
				<label><b>Data de nascimento</b></label>
				<input type="date" class="form-control" id="nasc" name="nasc" required value="<?php echo $lin['nasc']; ?>">
			</div>

			<div class="form-group col-sm-13">
				<label><b>Email</b></label>
				<input type="email" class="form-control" name="email" id="email" required value="<?php echo $lin['email']; ?>">
			</div>

			<?php if ($lin['ContaAtiva'] != '1') { ?>
				<div class="form-check">
					<input class="form-check-input" name="att" type="checkbox" value="" id="att">
					<label class="form-check-label" for="defaultCheck1"><b>Conta Ativa</b></label>
				</div>
			<?php } else { ?>
				<div class="form-check">
					<input class="form-check-input" name="att" type="checkbox" value="" id="att" checked>
					<label class="form-check-label" for="defaultCheck1"><b>Conta Ativa</b></label>
				</div>
			<?php } ?>

			<br>
			<div class="form-group col-sm-15">
				<label><b>Pertencente a que Produtora</b></label>
				<select class='form-control prod' name='prod'>
					<?php
					$sql = "select * from Produtores";
					$res = $lig->query($sql);
					while ($lin3 = $res->fetch_array()) {
						if ($lin['Codigo_Produtor'] == $lin3['Codigo_Produtor'])
							echo "<option value=", $lin3['Codigo_Produtor'], " selected='selected'>", $lin3['Nome_Produtor'], "</option>";
						else
							echo "<option value=", $lin3['Codigo_Produtor'], ">", $lin3['Nome_Produtor'], "</option>";
					}
					echo "</select>"; ?>
				</select>
			</div>

			<div class="form-group">
				<label><b>Foto de Jogo</b></label>
				<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
				<input type="file" class="form-control" id="img" placeholder="Foto de Utilizador" name="img">
			</div>

			<input type="submit" class="btn btn-secondary" name="submit">
			<input type="reset" class="btn btn-secondary" name="reset" value="Limpar a area de texto">
		</form>

	</center>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".tipu").change(function() {
				var id = $(this).val();
				var dataString = 'id=' + id;

				$.ajax({
					type: "POST",
					url: "tipou.php",
					data: dataString,
					cache: false,
					success: function(html) {
						$(".prod").html(html);
					}
				});
			});
		});
	</script>