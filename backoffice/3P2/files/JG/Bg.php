<?php
$c = $_REQUEST['cod'];
$n = $_REQUEST['n'];
$a = $_REQUEST['a'];
echo $a;

$n = str_replace(' ', '', $n);
$extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
$name = $n;

$NJfile = $name . "." . $extension;
$path = "./files/IMGBG/";
$img = $path . $NJfile;
$orig = $_FILES['img']['tmp_name'];

if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

if ($_FILES["img"]["name"] == null) {
	if ($a == "1") {
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=JOGlist>";
	} else {
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=addPJG>";
	}
} else {
	if (copy($orig, $img)) {

		$sql = "update Jogos set JGbg = '$img' where Codigo_Jogo='$c'";
		echo $sql;
		$lig->query($sql) or die("ERRO:Inserção na tabela Jogos");
		if ($a == "1") {
			echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=JOGlist>";
		} else {
			echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=addPJG>";
		}
	} else {
		echo $orig;
		echo "<center><br><br><br><a class=\"intro-lead-in\">Imagem não carregada!!!</a><br>";
		echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"index.php?cmd=addJOG\">Voltar</a></center>";
		echo "Alguma informação da transferência<br>";
		print_r($_FILES);
	}
}
