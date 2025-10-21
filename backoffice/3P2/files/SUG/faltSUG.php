<?php
	$c=$_REQUEST['cod'];
	$u=$_REQUEST['u'];
	$sql="select sugestoes.*, Utilizadores.* FROM sugestoes,Utilizadores where CodUtil = $u and sugesta=$c";
	$res=$lig->query($sql);
	$lin=$res->fetch_array();
	echo "<h1>".$lin['sugesta']."</h1>";
?>
		<br>
			<center><h1>Alterar Sugestão</h1><br><br>
		<form class="form-horizontal" method="POST" action="index.php?cmd=SUGalt2&cod=<?php echo $c."&u=".$u;?>">
		<div class="form-group">
		<label class="control-label col-sm-2" for="Codigo"><b>Código Sugestão</b></label>
		<div class="col-sm-4">
		<input type="text" readonly class="form-control" id="Codigo"  name="Codigo_sug" value="<?php echo $c;?>">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-sm-2" for="Designacao"><b>Nome de Jogo</b></label>
		<div class="col-sm-4">
		<input type="text" class="form-control" name="suges" value="<?php echo $lin['sugesta'];?>">
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label col-sm-2" for="Designacao"><b>Nome de Produtora</b></label>
		<div class="col-sm-4">
		<input type="text" class="form-control" name="pr" value="<?php echo $lin['NomePr'];?>">
		</div>
		</div>
		<br>

		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-secondary">Modificar Sugestão</button>
		</div>
		</div>
		</form>
		</div>
