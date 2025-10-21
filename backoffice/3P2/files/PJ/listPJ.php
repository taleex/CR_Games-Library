<?php
$tp = 5;
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
	$sql = "select JogosPlataforma.*,Jogos.*,Plataforma.* FROM JogosPlataforma,Jogos,Plataforma where CodigoJogo=Jogos.Codigo_Jogo and Codigo_Plataforma=CodigoPlataforma and upper (Nome_Jogo) like upper('$filtro') ORDER BY 	CodigoPlataforma";
else
	$sql = "select JogosPlataforma.*,Jogos.*,Plataforma.* FROM JogosPlataforma,Jogos,Plataforma where CodigoJogo=Jogos.Codigo_Jogo and Codigo_Plataforma=CodigoPlataforma ORDER BY 	CodigoPlataforma";

$res = $lig->query($sql);
$nr = $res->num_rows;
$qp = $nr / $tp + 1;

if ($filtro != '')
	$sql = "select JogosPlataforma.*,Jogos.*,Plataforma.* FROM JogosPlataforma,Jogos,Plataforma where CodigoJogo=Jogos.Codigo_Jogo and Codigo_Plataforma=CodigoPlataforma and upper (Nome_Jogo) like upper('$filtro') ORDER BY 	CodigoPlataforma limit $ini, $tp";
else
	$sql = "select JogosPlataforma.*,Jogos.*,Plataforma.* FROM JogosPlataforma,Jogos,Plataforma where CodigoJogo=Jogos.Codigo_Jogo and Codigo_Plataforma=CodigoPlataforma ORDER BY 	CodigoPlataforma limit $ini, $tp";
$res = $lig->query($sql);

?><br><br>

<center>
	<h1> Listagem de Jogos nas plantaformas</h1>
</center><br>

<center>

	<div class="col-sm-4">
		<form align="center" method="POST" action="index.php?cmd=PJGlist">
			<label><b>Pesquisar jogo nas plataformas:</b></label>
			<input type="text" class="form-control form-control-sm" name="pesquisa" value="<?php echo $filtro1; ?>"><br>
			<input type="submit" class="btn btn-secondary" value="Pesquisar">
			<input type="reset" class="btn btn-secondary" value="Limpar">
		</form>
	</div><br>

	<?php for ($i = 1; $i < $qp; $i++)
		echo "<b><a href=index.php?cmd=PJGlist&pag=$i&pesquisa=$filtro1>&nbsp$i&nbsp</a></b>"; ?>
</center>
<br>
<?php
if ($filtro != '')
	echo "<center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=PJGlist>Listar todos os Jogos nas plantaformas</a></center><br>";

if ($result = mysqli_query($lig, $sql)) {
	if (mysqli_num_rows($result) > 0) {
		echo "<div class='container'>";
		echo "<table class='table table-striped'>";
		echo "<tr>";
		echo "<th>Jogo</th>";
		echo "<th>Plantaforma</th>";
		echo "<th>Data de lançamento</th>";
		echo "<th></th>";
		echo "<th></th>";
		echo "</tr>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['Nome_Jogo'] . "</td>";
			echo "<td>" . $row['Nome_Plataforma'] . "</td>";
			echo "<td>" . $row['DataLanca'] . "</td>";
			if (($_SESSION['codtipoUti'] == 13) || ($_SESSION['emp'] == $row['Codigo_Produtor'])) {
				echo "<td><a href=index.php?cmd=PJGalt1&cod=$row[CodigoPlataforma]&jog=$row[CodigoJogo]>Alterar</a></td>";
				echo "<td><a href=index.php?cmd=delPJG&cod=$row[CodigoPlataforma]>Apagar</a></td>";
			} else {
				echo "<td></td><td></td>";
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