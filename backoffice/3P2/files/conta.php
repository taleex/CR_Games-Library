<br>
	<?php 
		echo "<br><br><center>";?>
		<img src="<?php echo '../../'.$_SESSION['foto'];?>" width='400' height='400'/>
		<?php echo "<h1>".$_SESSION['login']."</h1>";
		echo"<a style='margin:5px;' href='index.php?cmd=edit' class='btn btn-secondary'>Editar Conta</a>";
	?>
