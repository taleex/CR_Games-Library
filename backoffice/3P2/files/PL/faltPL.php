<?php

	$c=$_REQUEST['cod'];
	$sql="select * from Plataforma where Codigo_Plataforma = $c";
	$res=$lig->query($sql);
	$lin=$res->fetch_array();
?>
		<br>
			<center><h1>Alterar Plataforma</h1><br><br>
		<form class="form-horizontal" method="POST" action="index.php?cmd=PLalt2&Codigo_Plataforma=<?php echo $c;?>">
		<div class="form-group">
		<label class="control-label col-sm-2"><b>Código Plataforma</b></label>
		<div class="col-sm-4">
		<input type="text" readonly class="form-control" name="Codigo_Plataforma" value="<?php echo $c;?>">
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-sm-2" ><b>Nome de Plataforma</b></label>
		<div class="col-sm-4">
		<input type="text" class="form-control" name="Nome_Plataforma" value="<?php echo $lin['Nome_Plataforma'];?>">
		</div>
		</div>
		<br>

		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-secondary">Modificar Plataforma</button>
		</div>
		</div>
		</form>
		</div>
