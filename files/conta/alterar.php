<?php 
        $Loginalt=$_REQUEST['Loginalt'];
        $altutinome=$_REQUEST['altutinome'];
		$altemail=$_REQUEST['altemail'];
		$altnasc=$_REQUEST['altnasc'];
		$altpass=$_REQUEST['altpass'];
		
		$cod=$_SESSION['codUti'];
		
		// Get current user data to compare what changed
		$sql_current = "select * from Utilizadores where codUti = '$cod'";
		$res_current = $lig->query($sql_current);
		$lin_current = $res_current->fetch_array();
		
		// Build update query only for changed fields
		$update_fields = array();
		
		// Check if username changed
		if ($Loginalt != $lin_current['Login']) {
			$update_fields[] = "Login='$Loginalt'";
		}
		
		// Check if name changed
		if ($altutinome != $lin_current['Nome_Utilizador']) {
			$update_fields[] = "Nome_Utilizador='$altutinome'";
		}
		
		// Check if email changed
		if ($altemail != $lin_current['email']) {
			$update_fields[] = "email='$altemail'";
		}
		
		// Check if birth date changed
		if ($altnasc != $lin_current['nasc']) {
			$update_fields[] = "nasc='$altnasc'";
		}
		
		// Check if password changed (only update if not empty)
		if (!empty($altpass)) {
			$altpass_md5 = md5($altpass);
			if ($altpass_md5 != $lin_current['pass']) {
				$update_fields[] = "pass='$altpass_md5'";
			}
		}
		
		// Only update if there are changes
		if (!empty($update_fields)) {
			$sql = "update Utilizadores set " . implode(", ", $update_fields) . " where codUti='$cod'";
			$lig->query($sql) or die("ERRO:Atualização na tabela Utilizador");
			
			// Update session variables for changed fields
			if ($Loginalt != $lin_current['Login']) {
				$_SESSION['login'] = $Loginalt;
			}
			if ($altutinome != $lin_current['Nome_Utilizador']) {
				$_SESSION['nome'] = $altutinome;
			}
			if ($altemail != $lin_current['email']) {
				$_SESSION['email'] = $altemail;
			}
		}
		
		echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
?>
