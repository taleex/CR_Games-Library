<?php 
$servername = "sql100.infinityfree.com";
	$username = "if0_40948955";
	$password = "zBHdSjgr60";
	$database = "if0_40948955_gameslibrary";
		
$s=$_GET["q"];
	$lig= new mysqli ( $servername, $username, $password, $database) 
	or die ("Problema na ligação ao servidor MYSQL");

	$sql="Update sugestoes set lido='1' where Codigo_Sugestao = $s";
	$lig->query($sql);
	$sql1 = "select sugestoes.*, Utilizadores.* FROM sugestoes,Utilizadores where CodUtil=codUti AND lido = '0' limit 0,1";
	$res= $lig->query($sql1);
	if($a = $res->fetch_array()){?>
			<a class="panel-close close" data-dismiss="alert">×</a><strong><?php echo $a['Login']; ?></strong> sugeriu <?php echo "<strong>" . $a['sugesta'] . "</strong> de <strong>" . $a['NomePr'] . "</strong>"; ?>.
			<?php echo "<span style='color:White' class='fa fa-minus-circle' onclick='return su(this,$a[Codigo_Sugestao]);'></span>"; ?>
	<?php }
	else
		echo "<div>Sem sugestões</div>";
	
	
?>
