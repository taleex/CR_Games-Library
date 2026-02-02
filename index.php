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
	<link href="css/my.css" rel="stylesheet">

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
							<?php if ($linpr['Codigo_Produtor'] != 4) { ?>
								<li><a href="index.php?cmd=PRlist&cod=<?php echo $linpr['Codigo_Produtor']; ?>"><?php echo $linpr['Nome_Produtor']; ?></a></li>
							<?php } ?>
							<li><a href="backoffice/3P2/index.php">BackOFFICE</a></li>

						<?php } ?>
						<li>
							<div class='dropdown'>
								<button style='background-color:#d12141; color:#ffffff; padding: 8px 16px; font-size: 14px; border: none; border-radius: 4px; display: flex; align-items: center; gap: 8px;' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
									<img src="<?php echo  $_SESSION['foto'] ?>" width='24' height='24' style='border-radius: 50%; vertical-align: middle;'>
									<span style='text-transform: capitalize;'><?php echo $_SESSION['login'] ?></span>
									<span style='margin-left: auto;'>&#9660;</span>
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
		<form action="index.php?cmd=logini" method="post" id="loginForm">
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
						<div class="form-group">
							<label for="login">Login</label>
							<input type="text" class="form-control" id="login" name="uname" placeholder="Digite seu login">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="psw" placeholder="Digite sua password">
						</div>
						<div id="loginError" class="alert alert-danger" style="display: none;"></div>
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
		<form action="index.php?cmd=regi" method="post" id="registerForm">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="Modal">
						<div class="modal-header">
							<b>
								<h4 class="modal-title" style="color:#ffffff;">Registar</h4>
							</b>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="regLogin">Login</label>
							<input type="text" class="form-control" id="regLogin" name="utiLog" placeholder="Digite seu login" onblur="validateLogin(this)" required minlength="3" maxlength="50">
							<small id="loginError" class="form-text text-danger" style="display: none;"></small>
						</div>
						<div class="form-group">
							<label for="regEmail">Email</label>
							<input type="email" class="form-control" id="regEmail" name="email" placeholder="Digite seu email" oninput="validateEmailImmediate(this)" onblur="validateEmail(this)" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Formato de email inválido">
							<small id="emailError" class="form-text text-danger" style="display: none;"></small>
						</div>
						<div class="form-group">
							<label for="regName">Nome do utilizador</label>
							<input type="text" class="form-control" id="regName" name="utinome" placeholder="Digite seu nome completo" onblur="validateName(this)" required pattern="[a-zA-Z]+ [a-zA-Z]+" title="Digite o primeiro e último nome">
							<small id="nameError" class="form-text text-danger" style="display: none;"></small>
						</div>
						<div class="form-group">
							<label for="regNasc">Data de nascimento</label>
							<input type="date" class="form-control" id="regNasc" name="nasc" required>
						</div>
						<div class="form-group">
							<label for="regPassword">Password</label>
							<input type="password" class="form-control" id="regPassword" name="pass" placeholder="Digite sua password" oninput="validatePassword(this)" required minlength="6" maxlength="100">
							<small id="passwordError" class="form-text text-danger" style="display: none;"></small>
						</div>
						<div class="form-group">
							<label for="regConfirmPassword">Repita a Password</label>
							<input type="password" class="form-control" id="regConfirmPassword" name="confirm_password" placeholder="Confirme sua password" oninput="validateConfirmPassword(this)" required>
							<small id="confirmPasswordError" class="form-text text-danger" style="display: none;"></small>
						</div>
						<div id="submitError" class="alert alert-danger" style="display: none;"></div>
					</div>
					<div class="modal-footer">
						<button class='btn btn-secondary' style='margin:5px;' type='submit'>Registar</button>
						<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button></center>
					</div>
				</div>
			</div>
		</form>
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
