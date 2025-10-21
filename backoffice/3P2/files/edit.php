<style>
	div.a {
		position: relative;
		left: 450px;
	}
</style>
<br>
<center>
	<h3>Alterar os dados da conta <?php echo $_SESSION['login'] ?></h3>
</center>

<?php
$c = $_SESSION['codUti'];
$sql = "select* from Utilizadores where codUti = $c";
$res = $lig->query($sql);
$lin = $res->fetch_array();
?>

<center>
	<form enctype="multipart/form-data" action="index.php?cmd=alte" onsubmit="return altvalida(this);" method="post">


		<div class="col-sm-3">
			<div class="form-group">
				<label for="formGroupExampleInput"><b>Login</b></label>
				<input type="text" class="form-control" id="altutiLog" name="utiLog" onblur="return altexiste(this);" required value="<?php echo $lin['Login']; ?>">
				<div class="msg-erro" id='altxtlogin'></div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="form-group">
				<label for="formGroupExampleInput"><b>Nome do Utilizador</b></label>
				<input type="text" class="form-control" id="altutinome" name="utinome" onblur="return altvalidaNom(this);" required value="<?php echo $lin['Nome_Utilizador']; ?>">
				<span class='msg-erro msg-altutinome'></span>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="form-group">
				<b>Data de nascimento</b>
				<input type="date" class="form-control" id="nasc" name="nasc" value="<?php echo $lin['nasc']; ?>"></div>
		</div>

		<div class="col-sm-3">
			<div class="form-group"><b>Email</b>
				<input type="email" class="form-control" name="email" value="<?php echo $lin['email']; ?>" id="altemail" onBlur="return altvalidaMail(this);">
				<span class='msg-erro msg-altemail'></span>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="form-group">
				<label>Foto de Perfil</label>
				<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
				<input type="file" class="form-control" id="foto" placeholder="Foto de Perfil" name="img" required>
			</div>
		</div>

		<p><span class='msg-erro msg-altVal'></span></p>

		<input class="btn btn-secondary" type="submit" name="submit">
	</form>
</center><br>