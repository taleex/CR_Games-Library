<?php

$tipu = $_REQUEST['tipu'];
$utiLog = $_REQUEST['utiLog'];
$pass = $_REQUEST['pass'];
$utinome = $_REQUEST['utinome'];
$nasc = $_REQUEST['nasc'];
$email = $_REQUEST['email'];
$img = "./backoffice/3P2/files/IMG/defeito.png";

if (isset($_POST['att'])) {
	$att = 1;
} else {
	$att = 0;
}

$prod = $_REQUEST['prod'];

$sql = "insert into Utilizadores (codtipoUti,Login,pass,Nome_Utilizador,nasc,email,ContaAtiva,empresa,img) values ('$tipu','$utiLog',md5('$pass'),'$utinome','$nasc','$email','$att','$prod','$img')";
$lig->query($sql) or die("ERRO:Inserção na tabela Utilizadores");
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=UTIlist>";
