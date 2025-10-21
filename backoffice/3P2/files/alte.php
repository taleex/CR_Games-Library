<?php 
		$utiLog=$_REQUEST['utiLog'];
		$utinome=$_REQUEST['utinome'];
		$email=$_REQUEST['email'];
		$nasc=$_REQUEST['nasc'];
		
	
	$extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
	$name = $_SESSION['login'];

	$Nfile=$name.".".$extension;
	$path="../../backoffice/3P2/files/IMG/";
	$img=$path.$Nfile;
	$path="./backoffice/3P2/files/IMG/".$Nfile;
	$orig=$_FILES['img']['tmp_name'];

		$cod=$_SESSION['codUti'];
				
	if(copy($orig,$img)){
			$sql="update Utilizadores set Login='$utiLog', Nome_Utilizador='$utinome', nasc='$nasc', email='$email' , img='$path' where codUti='$cod'";
			$lig->query($sql) or die("ERRO:Inserção na tabela Utilizador");
			$_SESSION['foto'] = $path;
			$_SESSION['nome']  = $utinome;
			$_SESSION['email'] = $email;
			$_SESSION['login']  =  $utiLog;
			echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
		}
	else{
		echo "<center><br><br><br><a class=\"intro-lead-in\">Imagem não carregada!!!</a><br>";
		echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"index.php?cmd=edit\">Voltar</a></center>";
		echo "Alguma informação da transferência<br>";
		print_r($_FILES);

	}
?> 
