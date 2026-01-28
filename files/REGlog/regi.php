<?php

if ($lig->connect_error) {
    die("Connection failed: " . $lig->connect_error);
}

		 $tipu = 12; // Default to normal user type
		 $utiLog=$_REQUEST['utiLog'];
		 $pass=$_REQUEST['pass'];
		 $utinome=$_REQUEST['utinome'];
		 $nasc=$_REQUEST['nasc'];
		 $email=$_REQUEST['email'];
		 $img="./backoffice/3P2/files/IMG/defeito.png";
		 $att=1;
		 $prod = 4; // Default to "nenhuma" (none) for normal users
		 
	$sql = "insert into Utilizadores (codtipoUti,Login,pass,Nome_Utilizador,nasc,email,ContaAtiva,empresa,img) values ('$tipu','$utiLog',md5('$pass'),'$utinome','$nasc','$email','$att','$prod','$img')";
	$lig->query($sql) or die("ERRO:Inserção na tabela Utilizadores");
	
	// Automatic login after successful registration
	// Get the newly created user's data
	$login_hash = md5($pass);
	$sql_login = "select * from Utilizadores where Login = '$utiLog' and pass = '$login_hash'";
	$res_login = $lig->query($sql_login);
	
	if ($res_login->num_rows == 1) {
		$lin = $res_login->fetch_array();
		$_SESSION['codtipoUti']  = $lin['codtipoUti'];
		$_SESSION['codUti']  = $lin['codUti'];
		$_SESSION['nome']  = $lin['Nome_Utilizador'];
		$_SESSION['email'] = $lin['email'];
		$_SESSION['foto']  = $lin['img'];
		$_SESSION['login']  = $lin['Login'];
		$_SESSION['emp']  = $lin['empresa'];
		
		// Redirect to account page instead of home
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=conta>";
	} else {
		// Fallback to home if login fails for some reason
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
	}

?>
