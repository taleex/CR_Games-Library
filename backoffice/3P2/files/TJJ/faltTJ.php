<?php
	$c=$_REQUEST['cod'];
	$sql="select * from Tipo_de_Jogo where CodTipoJogo = $c";
	$res=$lig->query($sql);
	$lin=$res->fetch_array();
?>
		<br>

		<center><h1>Alterar Tipo de Jogo</h1><br><br>

		<form class="form-horizontal" method="POST" action="index.php?cmd=altTJ2&cod=<?php echo $c;?>">
  		<div class="form-group"><center><b>Código de tipo de Jogo</b></center>
    	<label class="control-label col-sm-2" for="Codigo"></label>
    	<div class="col-sm-4">
      	<input type="text" readonly class="form-control" id="Codigo" name="CodTipoJogo" value="<?php echo $c;?>">
    	</div></div>

		<div class="form-group"><center><b>Genero de Jogo</b></center>
		<label class="control-label col-sm-2" for="Designacao"></label>
		<div class="col-sm-4">
		<input type="text" class="form-control" id="Designacao" name="Genero" value="<?php echo $lin['Genero'];?>">
		</div></div>
		<br>


		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-secondary">Modificar tipo de Jogo</button>
		</div></div>
		</form>
