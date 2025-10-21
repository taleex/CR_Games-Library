<?php
$tp = 3;
if (isset($_REQUEST['pag']))
	$np = $_REQUEST['pag'];
else
	$np = 1;
$ini = ($np - 1) * $tp;

if ((isset($_REQUEST['pesquisa'])) && ($_REQUEST['pesquisa'] != '')) {
	$filtro1 = $_REQUEST['pesquisa'];
	$filtro = $_REQUEST['pesquisa'];
	$filtro = '%' . $filtro . '%';
} else $filtro = '';

if ($filtro != '')
	$sql = "select * from Tipo_de_utilizador where upper (dsg) like upper('$filtro') ORDER BY codtipoUti";
else
	$sql = "select  * from Tipo_de_utilizador ORDER BY codtipoUti";

$res = $lig->query($sql);
$nr = $res->num_rows;
$qp = $nr / $tp + 1;

if ($filtro != '')
	$sql = "select * from Tipo_de_utilizador where upper (dsg) like upper('$filtro') ORDER BY codtipoUti limit $ini, $tp";
else
	$sql = "select  * from Tipo_de_utilizador ORDER BY codtipoUti limit $ini, $tp";
$res = $lig->query($sql);

?><br><br>

<center>
	<h1> Listagem de tipo de Utilizadores</h1>
</center><br>

<center>

	<div class="col-sm-4">
		<form align="center" method="POST" action="index.php?cmd=TIPUlist">
			<label><b>Pesquisar Tipo de utilizador:</b></label>
			<input type="text" class="form-control form-control-sm" name="pesquisa" value="<?php echo $filtro1; ?>"><br>
			<input type="submit" class="btn btn-secondary" value="Pesquisar">
			<input type="reset" class="btn btn-secondary" value="Limpar">
		</form>
	</div><br>

	<?php for ($i = 1; $i < $qp; $i++)
		echo "<b><a href=index.php?cmd=TIPUlist&pag=$i&pesquisa=$filtro1>&nbsp$i&nbsp</a></b>"; ?>
</center>
<br>
<?php
if ($filtro != '')
	echo "<center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=TIPUlist>Listar todos os Tipos de utilizadores</a></center><br>";

if ($result = mysqli_query($lig, $sql)) {
	if (mysqli_num_rows($result) > 0) {
		echo "<div class='container'>";
		echo "<table class='table table-striped'>";
		echo "<tr>";
		echo "<th>Codigo</th>";
		echo "<th>Designação</th><th></th><th></th>";
		echo "</tr>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['codtipoUti'] . "</td>";
			echo "<td>" . $row['dsg'] . "</td>";
			echo "<td><a href=index.php?cmd=TIPUalt1&cod=$row[codtipoUti]>Alterar</a></td>";
			echo "<td><a href=index.php?cmd=delTIPU&cod=$row[codtipoUti]>Apagar</a></td>";
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