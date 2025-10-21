<?php

$u=$_REQUEST['uname'];
$p=$_REQUEST['psw'];

$p=md5($p);

$sql="select Utilizadores.* from Utilizadores where Login = '$u' and pass ='$p'";
$res=$lig->query($sql);

if ($res->num_rows == 1) {
	$lin = $res->fetch_array();
	$_SESSION['codtipoUti']  = $lin['codtipoUti'];
	$_SESSION['codUti']  = $lin['codUti'];
	$_SESSION['nome']  = $lin['Nome_Utilizador'];
	$_SESSION['email'] = $lin['email'];
	$_SESSION['foto']  = $lin['img'];
	$_SESSION['login']  = $lin['Login'];
	$_SESSION['emp']  = $lin['empresa'];
}

	echo "<meta http-equiv=refresh content=0;URL=index.php?cmd=home>";
?>
