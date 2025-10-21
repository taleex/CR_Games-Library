<?php 
        $Loginalt=$_REQUEST['Loginalt'];
        $altutinome=$_REQUEST['altutinome'];
		$altemail=$_REQUEST['altemail'];
		$altnasc=$_REQUEST['altnasc'];
		$altpass=md5($_REQUEST['altpass']);
		
		$cod=$_SESSION['codUti'];
				
	
			$sql="update Utilizadores set Login='$Loginalt', Nome_Utilizador='$altutinome', nasc='$altnasc', email='$altemail',pass='$altpass' where codUti='$cod'";
			$lig->query($sql) or die("ERRO:Inserção na tabela Utilizador");
			
			$_SESSION['nome']  = $altutinome;
			$_SESSION['email'] = $altemail;
			$_SESSION['login']  =  $Loginalt;
			
			echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
?> 
