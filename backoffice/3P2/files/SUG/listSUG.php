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
	$sql = "select sugestoes.*, Utilizadores.* FROM sugestoes,Utilizadores where CodUtil=codUti and upper (Login) like upper('$filtro') ORDER BY Codigo_Sugestao";
else
	$sql = "select sugestoes.*, Utilizadores.* FROM sugestoes,Utilizadores where CodUtil=codUti ORDER BY Codigo_Sugestao";

$res = $lig->query($sql);
$nr = $res->num_rows;
$qp = $nr / $tp + 1;

if ($filtro != '')
	$sql = "select sugestoes.*, Utilizadores.* FROM sugestoes,Utilizadores where CodUtil=codUti and upper (Login) like upper('$filtro') ORDER BY Codigo_Sugestao limit $ini, $tp";
else
	$sql = "select sugestoes.*, Utilizadores.* FROM sugestoes,Utilizadores where CodUtil=codUti ORDER BY Codigo_Sugestao limit $ini, $tp";
$res = $lig->query($sql);

?><br><br>

<center>
	<h1> Listagem de sugestões dos utilizadores</h1>
</center><br>

<center>

	<div class="col-sm-4">
		<form align="center" method="POST" action="index.php?cmd=SUGlist">
			<label><b>Pesquisar utilizador:</b></label> 
			<input type="text" class="form-control form-control-sm" name="pesquisa" value="<?php echo $filtro1; ?>"><br>
			<input type="submit" class="btn btn-secondary" value="Pesquisar">
			<input type="reset" class="btn btn-secondary" value="Limpar">
		</form>
	</div><br>

	<?php for ($i = 1; $i < $qp; $i++)
		echo "<b><a href=index.php?cmd=SUGlist&pag=$i&pesquisa=$filtro1>&nbsp$i&nbsp</a></b>"; ?>
</center>
<br>
<?php
if ($filtro != '')
	echo "<center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=SUGlist>Listar todas as sugestões</a></center><br>";
 
		if($result = mysqli_query($lig, $sql)){
				if(mysqli_num_rows($result) > 0){
					echo "<div class='container'>";
					echo"<table class='table table-striped'>";
					echo "<tr>";
					echo "<th>Codigo de sugestoes </th>";
					echo "<th>Utilizador</th>";
					echo "<th>Sugestão </th>";
					echo "<th>Produtora</th>";
					echo "<th></th>";
					echo "<th></th>";
					echo "<th></th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>" . $row['Codigo_Sugestao'] . "</td>";
						echo "<td>" . $row['Login'] . "</td>";
						echo "<td>" . $row['sugesta'] . "</td>";
						echo "<td>" . $row['NomePr'] . "</td>";
						if($row['lido'] == 1)
						echo "<td> lido </td>";
						else
						echo "<td> Não lido </td>";

						echo"<td><a href=index.php?cmd=SUGalt1&cod=$row[Codigo_Sugestao]&u=$row[CodUtil]>Alterar</a></td>";
						echo"<td><a href=index.php?cmd=delSUG&cod=$row[Codigo_Sugestao]&u=$row[CodUtil]>Apagar</a></td>";
						echo "</tr>";
					}
					echo "</table></center></div>";

				mysqli_free_result($result);
		} else{
			echo "Não foi encontrado resultados";
		}
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($lig);
		}

?>
