<?php

$tp = 2;
if (isset($_REQUEST['pag']))
	$np = $_REQUEST['pag'];
else
	$np = 1;
$ini = ($np - 1) * $tp;

if ((isset($_REQUEST['filt']) && $_REQUEST['filt'] != '') || (isset($_REQUEST['pesquisa']) && $_REQUEST['pesquisa'] != '')) {
	$filtro1 = $_REQUEST['filt'];
	$filtro = $_REQUEST['filt'];

	$filtro21 = $_REQUEST['pesquisa'];
	$filtro2 = $_REQUEST['pesquisa'];
	$filtro2 = '%' . $filtro2 . '%';
} else {
	$filtro = '';
	$filtro2 = '';
}

if (($filtro != '') || ($filtro2 != ''))
	$sql = "select ListaDesejos.*,Jogos.*,Utilizadores.* from Utilizadores,Jogos,ListaDesejos where codUti=codigUti and CodigoJogo=Codigo_Jogo AND upper (Codigo_Jogo) like upper('$filtro') and upper(Login) like upper('$filtro2') ORDER BY CodigoJogo";
else
	$sql = "select ListaDesejos.*,Jogos.*,Utilizadores.* from Utilizadores,Jogos,ListaDesejos where codUti=codigUti and CodigoJogo=Codigo_Jogo ORDER BY CodigoJogo";

$res = $lig->query($sql);
$nr = $res->num_rows;
$qp = $nr / $tp + 1;

if (($filtro != '') || ($filtro2 != '')) {
	$sql = "select ListaDesejos.*,Jogos.*,Utilizadores.* from Utilizadores,Jogos,ListaDesejos where codUti=codigUti and CodigoJogo=Codigo_Jogo AND upper (Codigo_Jogo) like upper('$filtro') and upper(Login) like upper('$filtro2') ORDER BY CodigoJogo limit $ini, $tp";
} else {
	$sql = "select ListaDesejos.*,Jogos.*,Utilizadores.* from Utilizadores,Jogos,ListaDesejos where codUti=codigUti and CodigoJogo=Codigo_Jogo ORDER BY CodigoJogo limit $ini, $tp";
}
$result = $lig->query($sql);
?><br><br>
<center>
	<h1> Listagem de Desejos</h1>
</center>
<br><br>

<div class="container">
	<form method="POST" action="index.php?cmd=LDlist">
		<div class="form-group">
			<label class="control-label col-sm-4" for="Designacao"><b>Seleccione Jogos:</b></label>
			<div class="col-sm-4">
				<select class="form-control" name="filt" required>
					<option value="">Nome de Jogo</option>
					<?php
					$sql2 = "select * from Jogos";
					$result2 = $lig->query($sql2);
					while ($lin2 = $result2->fetch_array()) {
						echo "<option value=", $lin2['Codigo_Jogo'], ">", $lin2['Nome_Jogo'], "</option>";
					}
					?>
				</select>
			</div>
		</div>

		<div class="form-group col-sm-4">

			<label><b>Pesquisar utilizador:</b></label>
			<input type="text" class="form-control form-control-sm" name="pesquisa" value="<?php echo $filtro21; ?>"><br>
			<input type="submit" class="btn btn-secondary" value="Pesquisar">
			<input type="reset" class="btn btn-secondary" value="Limpar">

		</div><br>

	</form>
</div>
<center>
	<?php for ($i = 1; $i < $qp; $i++)
		echo "<b><a href=index.php?cmd=LDlist&pag=$i&filt=$filtro1&pesquisa=$filtro2>&nbsp$i&nbsp</a></b>"; ?>
</center>

<br>
<?php
if (($filtro != '') || ($filtro2 != ''))
	echo "<div><center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=LDlist>Listar toda a Lista de Desejos</a></center></div><br><br>";
if ($result = mysqli_query($lig, $sql)) {
	if (mysqli_num_rows($result) > 0) {
		echo "<div class='container'>";
		echo "<table class='table table-striped'>";
		echo "<tr>";
		echo "<th>Utilizador</th>";
		echo "<th>Jogo</th>";
		echo "<th>Foto do Jogo</th>";
		echo "<th></th>";
		echo "<th></th>";
		echo "</tr>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['Login'] . "</td>";
			echo "<td>" . $row['Nome_Jogo'] . "</td>";
			echo "<td><img src=" . $row['IMGjg'] . " width='70' height='70'/></td>";
			if ($row['codUti'] == $_SESSION['codUti']) {
				echo "<td><a href=index.php?cmd=altLD1&cod=$row[codigUti]>Alterar</a></td>";
				echo "<td><a href=index.php?cmd=delLD&cod=$row[codigUti]&j=$row[CodigoJogo]>Apagar</a></td>";
			} else {
				echo "<td></td>";
				echo "<td></td>";
			}
			echo "</tr>";
		}
		echo "</table></center></div>";

		mysqli_free_result($result);
	} else {
		echo "Não foi encontrado resultados";
	}
} else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($lig);
}

?>