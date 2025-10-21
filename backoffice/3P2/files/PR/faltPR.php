<?php
	$c=$_REQUEST['cod'];
	$sql="select * from Produtores where Codigo_Produtor = $c";
	$res=$lig->query($sql);
	$lin=$res->fetch_array();
?>
<br>

		<center><h1>Alterar Produtores</h1><br><br>

		<form class="form-horizontal" method="POST" action="index.php?cmd=altPROE2&cod=<?php echo $c;?>">
  		<div class="form-group"><center><b>Código de Produtor</b></center>
    	<div class="col-sm-4">
      	<input type="text" readonly class="form-control" id="Codigo" name="Codigo_Produtor" value="<?php echo $c;?>">
    	</div></div>

		<div class="form-group"><center><b>Nome de Produtor</b></center>
		<div class="col-sm-4">
		<input type="text" class="form-control" id="Designacao" name="Nome_Produtor" value="<?php echo $lin['Nome_Produtor'];?>">
		</div></div>
		<br>


		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<button type="submit" class="btn btn-secondary">Modificar Produtor </button>
		</div></div>
		</form>
