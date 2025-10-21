<?php
$c = $_REQUEST['cod'];
$tipu = $_REQUEST['tipu'];
$utiLog = $_REQUEST['utiLog'];
$utinome = $_REQUEST['utinome'];
$nasc = $_REQUEST['nasc'];
$email = $_REQUEST['email'];
$prod = $_REQUEST['prod'];

if (isset($_POST['att'])) {
	$att = 1;
} else {
	$att = 0;
}

$extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
$name = $utiLog;

$NJfile = $name . "." . $extension;
$path = "./files/IMG/";
$img = $path . $NJfile;
$path = "./backoffice/3P2/files/IMG/" . $NJfile;
$orig = $_FILES['img']['tmp_name'];

if ($_FILES["img"]["name"] == null) {
	$sql = "update Utilizadores set codtipoUti='$tipu', Login='$utiLog', Nome_Utilizador='$utinome', nasc='$nasc', email='$email',ContaAtiva='$att', empresa='$prod' where codUti='$c'";
	$lig->query($sql) or die("ERRO:Inserção na tabela Utilizador");
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=UTIlist>";
} else {

	if (copy($orig, $img)) {
		$sql = "update Utilizadores set codtipoUti='$tipu', Login='$utiLog', Nome_Utilizador='$utinome', nasc='$nasc', email='$email',ContaAtiva='$att', empresa='$prod',img='$path' where codUti='$c'";
		$lig->query($sql) or die("ERRO:Inserção na tabela Utilizador");
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=UTIlist>";
	} else {
		echo "<center><br><br><br><a class=\"intro-lead-in\">Imagem não carregada!!!</a><br>";
		echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"index.php?cmd=edit\">Voltar</a></center>";
		echo "Alguma informação da transferência<br>";
		print_r($_FILES);
	}
}
