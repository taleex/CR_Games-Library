<?php
$c = $_REQUEST['cod'];
if ($_SESSION['codtipoUti'] == 13) {
	if (($c == 13) || ($c == 12)) {
		echo "<center>
			<h1>Em 10 segundos a pagina será redirecionada para o listar Tipo de utilizadores</h1>
			<br><button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#modalDELTIPU'>
				Razão do erro
			</button>
		</center>
		<div class='modal' id='modalDELTIPU'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Não é Possivel eliminar</h4>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
					</div>
					<div class='modal-body'>
						<p>O motivo de não ser possivel eliminar é o facto de estar a tentar eliminar o tipo de utilizador administrador ou produtor, razão de não permitir eleminar estes dois tipos de utilizadores é para que o sistema nao tenha problemas</p>
					</div>
					<div class='modal-footer'>
						<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
					</div>
				</div>
			</div>
		</div>";

		echo "<meta http-equiv=refresh content=10;URL=index.php?cmd=TIPUlist>";
	} else {
		$sql = "delete from Tipo_de_utilizador where codtipoUti = $c";
		$lig->query($sql) or die("ERRO:delete na tabela tipos de utilizadores");

		$sql2 = "select * from Utilizadores where codtipoUti = $c";
		$res2 = $lig->query($sql2);
		$lin2 = $res2->fetch_array();

		if ($lin2) {
			$sql3 = "delete from ListaDesejos where codigUti = " . $lin2['codUti'] . "";
			$lig->query($sql3) or die("ERRO:delete na tabela utilizadores");

			$sql1 = "delete from Utilizadores where codtipoUti = $c";
			$lig->query($sql1) or die("ERRO:delete na tabela utilizadores");
		}
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=TIPUlist>";
	}
} else {
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
}
