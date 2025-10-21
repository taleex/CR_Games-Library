<?php 
		
		$pass=md5($_REQUEST['altpass']);
		
		
		$cod=$_SESSION['codUti'];
				
			$sql="update Utilizadores set  pass='$pass' where codUti='$cod'";
			$lig->query($sql) or die("ERRO:Inserção na tabela Utilizador");
			echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
