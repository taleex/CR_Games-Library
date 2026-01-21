<?php
	$a=0;
		$Codigo_Produtor=$_REQUEST['Codigo_Produtor'];
		$CodTipoJogo=$_REQUEST['CodTipoJogo'];
		$Nome_Jogo=$_REQUEST['Nome_Jogo'];
		$descricao=$_REQUEST['descricao'];
		$Preco=$_REQUEST['Preco'];
		$DataLancamento=$_REQUEST['DataLancamento'];

		$NomeJogo = str_replace(' ', '', $Nome_Jogo);
		$extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		$name = $NomeJogo;

	$NJfile=$name.".".$extension;
	$path="./files/IMGJG/";
	$img=$path.$NJfile;
	$orig=$_FILES['img']['tmp_name'];

	if(copy($orig,$img)){
		$sql = "insert into Jogos (Codigo_Produtor,CodTipoJogo,Nome_Jogo,descricao,Preco,DataLancamento,IMGjg) values ('$Codigo_Produtor','$CodTipoJogo','$Nome_Jogo','$descricao','$Preco','$DataLancamento','$img')";
		$lig->query($sql) or die("ERRO:Inserção na tabela Jogos");
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=BGJG&n=$Nome_Jogo&p=$Codigo_Produtor&t=$CodTipoJogo&a=$a>";
			}
	else{
		echo "<center><br><br><br><a class=\"intro-lead-in\">Imagem não carregada!!!</a><br>";
		echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"index.php?cmd=addJOG\">Voltar</a></center>";
		echo "Alguma informação da transferência<br>";
		print_r($_FILES);}
