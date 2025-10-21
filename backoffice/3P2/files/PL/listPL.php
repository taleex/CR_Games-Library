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
	$sql = "select * FROM Plataforma where upper (Nome_Plataforma) like upper('$filtro') ORDER BY Codigo_Plataforma";
else
	$sql = "select * FROM Plataforma ORDER BY Codigo_Plataforma";

$res = $lig->query($sql);
$nr = $res->num_rows;
$qp = $nr / $tp + 1;

if ($filtro != '')
	$sql = "select * FROM Plataforma where upper (Nome_Plataforma) like upper('$filtro') ORDER BY Codigo_Plataforma limit $ini, $tp";
else
	$sql = "select * FROM Plataforma ORDER BY Codigo_Plataforma limit $ini, $tp";
$res = $lig->query($sql);

?><br><br>

<center>
	<h1> Listagem de Plataformas</h1>
</center><br>

<center>

	<div class="col-sm-4">
		<form align="center" method="POST" action="index.php?cmd=PLlist">
			<label><b>Pesquisar Plataforma:</b></label>
			<input type="text" class="form-control form-control-sm" name="pesquisa" value="<?php echo $filtro1; ?>"><br>
			<input type="submit" class="btn btn-secondary" value="Pesquisar">
			<input type="reset" class="btn btn-secondary" value="Limpar">
		</form>
	</div><br>

	<?php for ($i = 1; $i < $qp; $i++)
		echo "<b><a href=index.php?cmd=PLlist&pag=$i&pesquisa=$filtro1>&nbsp$i&nbsp</a></b>"; ?>
</center>
<br>
<?php
if ($filtro != '')
	echo "<center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=PLlist>Listar todas as Plataformas</a></center><br>";

if ($result = mysqli_query($lig, $sql)) {
	if (mysqli_num_rows($result) > 0) {
		echo "<div class='container'>";
		echo "<table class='table table-striped'>";
		echo "<tr>";
		echo "<th>Codigo de Plataforma </th>";
		echo "<th>Nome de Plataforma </th>";
		echo "<th></th>";
		echo "<th></th>";
		echo "</tr>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['Codigo_Plataforma'] . "</td>";
			echo "<td>" . $row['Nome_Plataforma'] . "</td>";
			echo "<td><a href=index.php?cmd=PLalt1&cod=$row[Codigo_Plataforma]>Alterar</a></td>";
			echo "<td><a href=index.php?cmd=delPL&cod=$row[Codigo_Plataforma]>Apagar</a></td>";
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