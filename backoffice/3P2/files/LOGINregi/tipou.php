<?php
include('files/cone.php');
if ($_POST['id']) {
	$id = $_POST['id'];
	if ($id == 12) {
		$s = "select * from Produtores where Codigo_Produtor not like '4'";
	} else {
		$s = "select * from Produtores where Codigo_Produtor like '4'";
	}
}
$res = $lig->query($s);
if ($res->num_rows == 0) {
	echo "<option>Erro</option>";
} else {
	while ($lin = $res->fetch_array()) {
		echo "<option value=", $lin['Codigo_Produtor'], ">", $lin['Nome_Produtor'], "</option>";
	}
}
