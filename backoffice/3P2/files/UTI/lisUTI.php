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
	$sql = "select Utilizadores.*,Tipo_de_utilizador.*,Produtores.* from Utilizadores,Tipo_de_utilizador,Produtores where Utilizadores.codtipoUti=Tipo_de_utilizador.codtipoUti and Codigo_Produtor=empresa and upper (Login) like upper('$filtro')";
else
	$sql = "select Utilizadores.*,Tipo_de_utilizador.*,Produtores.* from Utilizadores,Tipo_de_utilizador,Produtores where Utilizadores.codtipoUti=Tipo_de_utilizador.codtipoUti and Codigo_Produtor=empresa";

$res = $lig->query($sql);
$nr = $res->num_rows;
$qp = $nr / $tp + 1;

if ($filtro != '')
	$sql = "select Utilizadores.*,Tipo_de_utilizador.*,Produtores.* from Utilizadores,Tipo_de_utilizador,Produtores where Utilizadores.codtipoUti=Tipo_de_utilizador.codtipoUti and Codigo_Produtor=empresa and upper (Login) like upper('$filtro') limit $ini, $tp";
else
	$sql = "select Utilizadores.*,Tipo_de_utilizador.*,Produtores.* from Utilizadores,Tipo_de_utilizador,Produtores where Utilizadores.codtipoUti=Tipo_de_utilizador.codtipoUti and Codigo_Produtor=empresa limit $ini, $tp";
$res = $lig->query($sql);

?><br><br>

<center>
	<h1> Listagem de Utilizadores</h1>
</center><br>

<center>
	<div class="col-sm-4">
		<form align="center" method="POST" action="index.php?cmd=UTIlist">
			<label><b>Pesquisar Utilizador:</b></label> 
			<input type="text" class="form-control form-control-sm" name="pesquisa" value="<?php echo $filtro1; ?>"><br>
			<input type="submit" class="btn btn-secondary" value="Pesquisar">
			<input type="reset" class="btn btn-secondary" value="Limpar">
		</form>
	</div><br>

	<?php for ($i = 1; $i < $qp; $i++)
		echo "<b><a href=index.php?cmd=UTIlist&pag=$i&pesquisa=$filtro1>&nbsp$i&nbsp</a></b>"; ?>
</center>

<br>
<?php
if ($filtro != '')
	echo "<center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=UTIlist>Listar todos os utilizadores</a></center><br>";

if ($result = mysqli_query($lig, $sql)) {
	if (mysqli_num_rows($result) > 0) {

		echo "<div class='container'>";
		echo "<table class='table table-striped'>";
		echo "<tr>";
		echo "<th>cod</th>";
		echo "<th>Tipo</th>";
		echo "<th>Login</th>";
		echo "<th>Nome</th>";
		echo "<th>data nasc</th>";
		echo "<th>email</th>";
		echo "<th>estados</th>";
		echo "<th>Empresa</th>";
		echo "<th>Imagem</th><th></th><th></th>";
		echo "</tr>";
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['codUti'] . "</td>";
			echo "<td>" . $row['dsg'] . "</td>";
			echo "<td>" . $row['Login'] . "</td>";
			echo "<td>" . $row['Nome_Utilizador'] . "</td>";
			echo "<td>" . $row['nasc'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			if ($row['ContaAtiva'] == 1)
				echo "<td> Ativo </td>";
			else if ($row['ContaAtiva'] == 0)
				echo "<td> inativo </td>";
			echo "<td>" . $row['Nome_Produtor'] . "</td>"; ?>
			<td><img id="img" src="../../<?php echo $row['img']; ?>" width='50' height='50' /></td>
<?php
			echo "<td><a href=index.php?cmd=UTIalt1&cod=$row[codUti]>Alterar</a></td>";
			echo "<td><a href=index.php?cmd=delUTI&cod=$row[codUti]>Apagar</a></td>";
			echo "</tr>";
		}
		echo "</table>";

		mysqli_free_result($result);
	} else {
		echo "Não foi encontrado resultados";
	}
} else {
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($lig);
}
?>