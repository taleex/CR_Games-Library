<?php

		$extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		echo $_FILES["img"]["name"];
		$name = "video";

	$NJfile=$name.".".$extension;
	$path="./backoffice/3P2/files/IMG/";
	$img=$path.$NJfile;
	$orig=$_FILES['img']['tmp_name'];

if(copy($orig,$img)){
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=conta>";
}
else{
	echo "<center><br><br><br><a class=\"intro-lead-in\">Imagem não carregada!!!</a><br>";
	echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"index.php?cmd=conta\">Voltar</a></center>";
	echo "Alguma informação da transferência<br>";
	print_r($_FILES);
}?>