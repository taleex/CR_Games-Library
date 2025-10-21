<?php
include('files/cone.php');
if ($_POST['id']) {
	$id = $_POST['id'];

	if ($id == 0)
		echo "<option selected='selected'>--Escolha o Tipo de Utilizador--</option>";
	else
		$s = "select * from Produtores where Codigo_Produtor like '4'";

	$res = $lig->query($s);
	if ($res->num_rows == 0) {
		echo "<option>Erro</option>";
	} else {
		while ($lin = $res->fetch_array()) {
			echo "<option value=", $lin['Codigo_Produtor'], ">", $lin['Nome_Produtor'], "</option>";
		}
	}
}
