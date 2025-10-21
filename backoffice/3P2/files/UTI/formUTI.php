<center>
	<h1>Adicionar Utilizador</h1>


	<form action="index.php?cmd=UTIins" method="POST" onsubmit="return valida();">
		<br>

		<div class="form-group col-sm-4">
			<label class="control-label" for="Codigo"><b>Tipo de utilizador</b></label>
			<select class="form-control tipu" id="tipuui" name="tipu">
		</div>

		<?php
		$sql = "select * from Tipo_de_utilizador";
		$res = $lig->query($sql);
		while ($lin = $res->fetch_array()) {
			echo "<option value=", $lin['codtipoUti'], ">", $lin['dsg'], "</option>";
		}
		echo "</select>";
		?>

		<div class="form-group col-sm-13">
			<label for="formGroupExampleInput"><b>Login</b></label>
			<input type="text" class="form-control" id="utiLog" name="utiLog" required placeholder="GamerPT2005" onblur="return existe(this);">
			<div class="msg-erro" id='txtlogin'></div>
		</div>

		<div class="form-group col-sm-13">
			<label for="formGroupExampleInput"><b>Password</b></label>
			<input type="password" class="form-control" id="pass" name="pass" onChange="PasswordMatch(this);" required>
			<span class='msg-erro msg-pass'></span>
		</div>

		<div class="form-group col-sm-13">
			<label for="formGroupExampleInput"><b>Confirmação de password Password</b></label>
			<input type="password" class="form-control" id="confirm_password" name="confirm_password" onChange="PasswordMatch(this);" required>
			<span class='msg-erro msg-cpass'></span>
		</div>

		<div class="form-group col-sm-13">
			<label for="formGroupExampleInput"><b>Nome do Utilizador(Primeiro e Ultimo)</b></label>
			<input type="text" class="form-control" id="utinome" name="utinome" placeholder="Adolfo Lenin" onblur="return validaNom(this);" required>
			<span class='msg-erro msg-nome'></span>
		</div>

		<div class="form-group col-sm-13">
			<label for="formGroupExampleInput"><b>Data de nascimento</b></label>
			<input type="date" class="form-control" id="nasc" name="nasc">
		</div>

		<div class="form-group col-sm-13">
			<label for="formGroupExampleInput"><b>Email</b></label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Introduza o E-mail" onblur="return validaMail(this);">
			<span class='msg-erro msg-email'></span>
		</div>

		<div class="form-check">
			<input class="form-check-input" name="att" type="checkbox" value="0" id="att">
			<label class="form-check-label" for="defaultCheck1"><b> Conta Ativa</b></label>
		</div>

		<br>

		<div class="form-group col-sm-13">
			<label for="formGroupExampleInput"><b>Pertencente a que Produtora</b></label>
			<select class="form-control prod" name="prod">
		</div>

		<?php
		$sql = "select * from Produtores";
		$res = $lig->query($sql);
		while ($lin = $res->fetch_array()) {
			echo "<option value=", $lin['Codigo_Produtor'], ">", $lin['Nome_Produtor'], "</option>";
		}
		echo "</select>"; ?> <br>

		<input class="btn btn-secondary" type="submit" name="submit">
		<input class="btn btn-secondary" type="reset" name="reset" value="Limpar a area de texto">

	</form>


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
</center>