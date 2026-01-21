<?php
session_start();
include "files/cone.php";
if (isset($_REQUEST['cmd']))
	$cmd = $_REQUEST['cmd'];
else
	$cmd = 'home';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>GL- Games Library</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link href="img/icon.png" rel="icon">
	<link href="img/icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

	<!-- Bootstrap CSS File -->
	<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!-- Libraries CSS Files -->
	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="lib/animate/animate.min.css" rel="stylesheet">
	<link href="lib/venobox/venobox.css" rel="stylesheet">
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Main Stylesheet File -->
	<link href="css/style.css" rel="stylesheet">

	<!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->

	<style type="text/css">
		.msg-erro {
			color: red;
		}

		div.Modal {
			background-color: #f82249;
		}
	</style>
</head>

<body style="background-color: #91162c">

	<!--==========================
    			Header
  	============================-->
	<header id="header">
		<div class="container">

			<div id="logo" class="pull-left">
				<a href="index.php?cmd=indx" class="scrollto"><img src="img/logo.png" alt="" title=""></a>
			</div>

			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li class="<?php echo ($cmd == 'home' || $cmd == 'indx') ? 'menu-active' : ''; ?>"><a href="index.php?cmd=home">Home</a></li>
					<li class="<?php echo ($cmd == 'JGlist' || $cmd == 'JGinf' || $cmd == 'TJlist') ? 'menu-active' : ''; ?>"><a href="index.php?cmd=JGlist">Jogos</a></li>

					<?php if ((isset($_SESSION['codtipoUti']))) {

						$c = $_SESSION['codUti'];

						if (($_SESSION['codtipoUti'] == '13')) { ?>
							<li><a href="backoffice/3P2/index.php">BackOFFICE</a></li>
						<?php }
						if (($_SESSION['codtipoUti'] == '12')) {
							$sqlpr = "select Utilizadores.*,Produtores.* from Utilizadores,Produtores where Codigo_Produtor=empresa and codUti = $c";
							$respr = $lig->query($sqlpr);
							$linpr = $respr->fetch_array();
							$pr = $linpr['Codigo_Produtor'];


						?>
							<li><a href="index.php?cmd=PRlist&cod=<?php echo $linpr['Codigo_Produtor']; ?>"><?php echo $linpr['Nome_Produtor']; ?></a></li>
							<li><a href="backoffice/3P2/index.php">BackOFFICE</a></li>

						<?php } ?>
						<li>
							<div class='dropdown'>
								<button style='background-color:#d12141; color:#ffffff;' class='btn dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
									<b><a></a><?php echo $_SESSION['login'] ?></b><a style='margin:3px;'></a><img src="<?php echo  $_SESSION['foto'] ?>" width='30' height='30'>
								</button>
								<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
									<a class='dropdown-item' href='index.php?cmd=conta' style='color:#f82249;'>A minha Conta</a>
									<div class='dropdown-divider'></div>
									<a class='dropdown-item' href='index.php?cmd=logout' style='color:#f82249;'>Logout</a>
								</div>
							</div>
						</li>

					<?php } else { ?>
						<li class="buy-tickets"><a data-toggle="modal" data-target="#log">Login</a></li>
						<li class="buy-tickets"><a data-toggle="modal" data-target="#reg">Registar</a></li>
					<?php } ?>
				</ul>
			</nav><!-- #nav-menu-container -->
		</div>
	</header><!-- #header -->
	<?php switch ($cmd) {

		case "indx":
			require('files/home.php');
			break;
		case "home":
			require('files/home.php');
			break;

			//login  registar
		case "logini":
			require('files/REGlog/log.php');
			break;
		case "reg":
			require('files/REGlog/registar.html');
			break;
		case "regi":
			require('files/REGlog/regi.php');
			break;

			//conta
		case "logout":
			require('files/REGlog/logout.php');
			break;

		case "conta":
			require('files/conta/conta.php');
			break;

		case "alt":
			require('files/conta/alterar.php');
			break;

		case "ft":
			require('files/conta/ft.php');
			break;

		case "delft":
			require('files/conta/delft.php');
			break;

			//Jogos
		case "JGlist":
			require('files/JG/JGlist.php');
			break;

		case "JGinf":
			require('files/JG/JGinf.php');
			break;

		case "JGld":
			require('files/JG/JGld.php');
			break;

		case "JGldR":
			require('files/JG/JGldR.php');
			break;

		case "TJlist":
			require('files/JG/TJlist.php');
			break;

		case "LDlist":
			require('files/LD/listLD.php');
			break;

			//Produtor
		case "PRlist":
			require('files/PR/PRlist.php');
			break;

			//Plataforma
		case "PLlist":
			require('files/PL/listPL.php');
			break;

			//Video Home
		case "vd":
			require('files/vd.php');
			break;

		case "delvd":
			require('files/delvd.php');
			break;

			//Sugestão
		case "addSug":
			require('files/SUG/addsug.php');
			break;

			//email
		case "em":
			require('files/email/email.php');
			break;
	} ?>



	<!--Modais-->
	<!-- Modal Login -->
	<div class="modal fade" id="log" role="dialog">
		<form action="index.php?cmd=logini" method="post">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="Modal">
						<div class="modal-header">
							<b>
								<h4 class="modal-title" style="color:#ffffff;">Login</h4>
							</b>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
					</div>
					<div class="modal-body">
						<div class="col-auto">
							<b>Login</b>
							<input type="text" class="form-control" placeholder="Login" name="uname" required>
						</div>
						<br>
						<div class="col-auto">
							<b>Password</b>
							<input type="password" class="form-control" placeholder="password" name="psw" required>
						</div>
					</div>
					<div class="modal-footer">
						<button class='btn btn-secondary' style='margin:5px;' type='submit'>Login</button>
						<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button></center>
					</div>
				</div>
			</div>
		</form>
	</div>


	<!-- Modal Registar -->
	<div class="modal fade" id="reg" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="Modal">
					<div class="modal-header">
						<h4 class="modal-title" style="color:#ffffff;">Registar</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
				</div>
				<div class="modal-body">
					<form action="index.php?cmd=regi" method="post" onsubmit="return valida();">
						<div class="form-group">
							<div class="col-sm-13"><b>Tipo de utilizador</b>
								<select class="form-control tipu" id="tipuui" name="tipu" required>
									<option>Escolher...</option>
									<?php
									$sql3 = "select * from Tipo_de_utilizador where dsg not like'Adm%' and dsg not like'Prod%'";
									$res3 = $lig->query($sql3);
									while ($lin3 = $res3->fetch_array()) {
										$id = $lin3['codtipoUti'];
										$data = $lin3['dsg'];
										echo "<option value=", $lin3['codtipoUti'], ">", $lin3['dsg'], "</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group"><b>Login</b><br>
							<input type="text" id="utiLog" name="utiLog" placeholder="GamerPT2005" onblur="return existe(this);" class="form-control" required>
							<div class="msg-erro" id='txtlogin'></div>
						</div>

						<div class="form-group"><b>Password</b><br>
							<input type="password" class="form-control" id="pass" name="pass" onChange="PasswordMatch(this);" required></input>
							<span class='msg-erro msg-pass'></span>
						</div>

						<div class="form-group"><b>Repita a Password</b><br>
							<input type="password" class="form-control" id="confirm_password" name="confirm_password" onChange="PasswordMatch(this);" required>
							<span class='msg-erro msg-cpass'></span>
						</div>

						<div class="form-group">
							<label for="formGroupExampleInput"><b>Nome do utlizador (Primeiro e Ultimo)</b></label>
							<input type="text" class="form-control" id="utinome" name="utinome" placeholder="Adolfo Lenin" onblur="return validaNom(this);" required>
							<span class='msg-erro msg-nome'></span>
						</div>

						<div class="form-group">
							<b>Data de nascimento</b>
							<input type="date" class="form-control" id="nasc" name="nasc"></div>

						<div class="form-group"><b>Email</b>
							<input type="email" class="form-control" name="email" id="email" placeholder="Introduza o E-mail" onblur="return validaMail(this);">
							<span class='msg-erro' id='txtemail'></span>
						</div>
						
					<div class='form-group'>
						<b>Pertencente a que Produtora</b>
						<select class='form-control prod' name='prod'>
							<option selected='selected'>--Escolha o Tipo de Utilizador--</option>
						</select>
					</div>

				<span class='msg-erro msg-registo'></span>
				<div class="modal-footer">
					<button class='btn btn-default' style='margin:5px;' type='submit'>Registar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
				</form>
				</div>


			</div>
		</div>
	</div>
	<!--Fim dos Modal-->

	<script type="text/javascript">
		$(document).ready(function() {
			$(".tipu").change(function() {
				var id = $(this).val();
				var dataString = 'id=' + id;

				$.ajax({
					type: "POST",
					url: "tipou.php",
					data: dataString,
					cache: false,
					success: function(html) {
						$(".prod").html(html);
					}
				});
			});
		});
	</script>
	<!-- JavaScript Libraries -->
	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/jquery/jquery-migrate.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="lib/easing/easing.min.js"></script>
	<script src="lib/superfish/hoverIntent.js"></script>
	<script src="lib/superfish/superfish.min.js"></script>
	<script src="lib/wow/wow.min.js"></script>
	<script src="lib/venobox/venobox.min.js"></script>
	<script src="lib/owlcarousel/owl.carousel.min.js"></script>


	<script type="text/javascript" src="js/valida.js"></script>
	<!-- Contact Form JavaScript File -->
	<script src="contactform/contactform.js"></script>

	<!-- Template Main Javascript File -->
	<script src="js/main.js"></script>
</body>

</html>
