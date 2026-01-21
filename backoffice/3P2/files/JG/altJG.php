<?php
$a = 1;
$Codigo_Jogo = $_REQUEST['cod'];
$Codigo_Produtor = $_REQUEST['Codigo_Produtor'];
$CodTipoJogo = $_REQUEST['CodTipoJogo'];
$Nome_Jogo = $_REQUEST['Nome_Jogo'];
$DataLancamento = $_REQUEST['DataLancamento'];
$descricao = $_REQUEST['descricao'];
$Preco = $_REQUEST['Preco'];

$NomeJogo = str_replace(' ', '', $Nome_Jogo);
echo $NomeJogo;
$extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
$name = $NomeJogo;

$NJfile = $name . "." . $extension;
$path = "./files/IMGJG/";
$imgjg = $path . $NJfile;
$orig = $_FILES['img']['tmp_name'];

if (!is_dir($path)) {
    mkdir($path, 0755, true);
}

echo "<script>console.log('Original path: " . addslashes($orig) . "');</script>";
echo "<script>console.log('Target path: " . addslashes($imgjg) . "');</script>";
echo "<script>console.log('Directory exists: " . (is_dir($path) ? 'yes' : 'no') . "');</script>";
echo "<script>console.log('Directory writable: " . (is_writable($path) ? 'yes' : 'no') . "');</script>";

if ($_FILES["img"]["name"] == null) {
	$sql = "update Jogos set Codigo_Produtor = '$Codigo_Produtor', CodTipoJogo = '$CodTipoJogo', Nome_Jogo = '$Nome_Jogo', DataLancamento = '$DataLancamento', descricao = '$descricao', Preco = '$Preco' where Codigo_Jogo='$Codigo_Jogo'";
	$lig->query($sql) or die("ERRO: alteração da tabela Jogos");
	echo "Alteração efetuada com sucesso!";
	echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=BGJG&cod=$Codigo_Jogo&a=$a>";
} else {

	if (move_uploaded_file($orig, $imgjg)) {
		$sql = "update Jogos set Codigo_Produtor = '$Codigo_Produtor', CodTipoJogo = '$CodTipoJogo', Nome_Jogo = '$Nome_Jogo', DataLancamento = '$DataLancamento', descricao = '$descricao', Preco = '$Preco', IMGjg='$imgjg' where Codigo_Jogo='$Codigo_Jogo'";
		$lig->query($sql) or die("ERRO: alteração da tabela Jogos");
		echo "Alteração efetuada com sucesso!";
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=BGJG&cod=$Codigo_Jogo&a=$a>";
	} else {
		echo "<center><br><br><br><a class=\"intro-lead-in\">Imagem não carregada!!!</a><br>";
		echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"index.php?cmd=altTJ1\">Voltar</a></center>";
		echo "Alguma informação da transferência<br>";
		print_r($_FILES);
	}
}
