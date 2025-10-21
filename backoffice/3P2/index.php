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
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Games Library DB</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!--JAVASCRIPT-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>


	<!-- Custom styles for this template -->
	<link href="css/full-width-pics.css" rel="stylesheet">

	<link rel="icon" href="x/icon.ico" type="image/x-icon">
	<style type="text/css">
		.msg-erro {
			color: red;
		}
	</style>

</head>

<body style="background-color:#ded2ba;">

	<!-- Menu -->
	<nav class='navbar navbar-expand-lg navbar-dark bg-dark fixed-top'>
		<div class='container'>
			<a class='navbar-brand' href='index.php?cmd=indx'><b>G L D B</b></a>
			<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
				<span class='navbar-toggler-icon'></span>
			</button>



			<?php
			//TESTE
			if ((isset($_SESSION['codtipoUti']))) {

				//ADM
				if ($_SESSION['codtipoUti'] == 13) {
					//utilizadores
			?>

					<div class='dropdown'>
						<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Utilizadores </button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='index.php?cmd=TIPUadd'>Novo Tipo de Utilizadores</a>
							<a class='dropdown-item' href='index.php?cmd=addUTI'>Novo Utilizador</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href='index.php?cmd=TIPUlist'>Listar Tipo de Utilizadores</a>
							<a class='dropdown-item' href='index.php?cmd=UTIlist'>Listar Utilizadores</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href='index.php?cmd=UTIPR'>Listar utilizador quase produtor
								<div class='dropdown-divider'></div>
								<a class='dropdown-item' href="pdf/pdf.php" target="BLANK">Listar Utilizadores PDF</a>
						</div>
					</div>

					<!-- JOGOS -->
					<div class='dropdown'>
						<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Jogos </button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='index.php?cmd=addTJ'>Nova Tipo de Jogo</a>
							<a class='dropdown-item' href='index.php?cmd=addJOG'>Novo Jogo</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href='index.php?cmd=TJlist'>Listar Tipos de Jogos</a>
							<a class='dropdown-item' href='index.php?cmd=JOGlist'>Listar Jogos</a>
						</div>
					</div>


					<!-- //Plantaforma e Jogos -->
					<div class='dropdown'>
						<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Plantaforma e Jogos </button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='index.php?cmd=PLadd'>Nova Plantaforma</a>
							<a class='dropdown-item' href='index.php?cmd=addPJG'>Adicionar Jogos nas Plantaformas</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href='index.php?cmd=PLlist'>Listar Plantaformas</a>
							<a class='dropdown-item' href='index.php?cmd=PJGlist'>Listar Jogos nas Plantaformas</a>
						</div>
					</div>

					<!-- //Produtores -->
					<div class='dropdown'>
						<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Produtor </button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='index.php?cmd=addPROE'>Novo Produtor</a>
							<a class='dropdown-item' href='index.php?cmd=PROElist'>Listar Produtores</a>
						</div>
					</div>

					<!-- //Lista de Desejos -->
					<div class='dropdown'>
						<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Lista de Desejos </button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='index.php?cmd=addLD'>Novo Desejo</a>
							<a class='dropdown-item' href='index.php?cmd=LDlist'>Listar Desejos</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href='index.php?cmd=addSUG'>Nova Sugestão</a>
							<a class='dropdown-item' href='index.php?cmd=SUGlist'>Listar Sugestões</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href="pdf/pdf2/pdf.php" target="BLANK">Lista de desejos PDF</a>
						</div>
					</div>
				<?php
					//Produtores
				} else if ($_SESSION['codtipoUti'] == 12) { ?>

					<!--//JOGOS -->
					<div class='dropdown'>
						<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Jogos </button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='index.php?cmd=addTJ'>Nova Tipo de Jogo</a>
							<a class='dropdown-item' href='index.php?cmd=addJOG'>Novo Jogo</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href='index.php?cmd=TJlist'>Listar Tipos de Jogos</a>
							<a class='dropdown-item' href='index.php?cmd=JOGlist'>Listar Jogos</a>
						</div>
					</div>

					<!--/Plantaforma e Jogos -->
					<div class='dropdown'>
						<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Plantaforma e Jogos </button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='index.php?cmd=PLadd'>Nova Plantaforma</a>
							<a class='dropdown-item' href='index.php?cmd=addPJG'>Adicionar Jogos nas Plantaformas</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href='index.php?cmd=PLlist'>Listar Plantaformas</a>
							<a class='dropdown-item' href='index.php?cmd=PJGlist'>Listar Jogos nas Plantaformas</a>
						</div>
					</div>
					<?php
					for ($i = 0; $i <= 20; $i++) {
						echo "<a style='margin:5px;'></a>";
					}
				}
				//Normal e outros
				else {
					?>
					<!--//Jogos -->
					<div class='dropdown'>
						<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Jogos </button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='index.php?cmd=TJlist'>Listar Tipos de Jogos</a>
							<a class='dropdown-item' href='index.php?cmd=JOGlist'>Listar Jogos</a>
						</div>
					</div>

					<!--//Lista de Desejos -->
					<div class='dropdown'>
						<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Lista de Desejos </button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
							<a class='dropdown-item' href='index.php?cmd=addLD'>Novo Desejo</a>
							<a class='dropdown-item' href='index.php?cmd=LDlist'>Listar Desejos</a>
						</div>
					</div>
				<?php
					for ($i = 0; $i <= 30; $i++) {
						echo "<a style='margin:5px;'></a>";
					}
				}
				for ($i = 0; $i <= 17; $i++) {
					echo "<a style='margin:5px;'></a>";
				}


				?>

				<div class='dropdown'>
					<button style='margin:5px;' class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						<?php echo $_SESSION['login'] ?></h6><a style='margin:5px;'></a><img src="<?php echo '../../' . $_SESSION['foto'] ?>" width='25' height='25' /><a style='margin:5px;'></a>
					</button>
					<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
						<a class='dropdown-item' href='index.php?cmd=conta'>A minha Conta</a>
						<button type='button' class='dropdown-item' data-toggle='modal' data-target='#PASSW'>Alterar password</button>
						<div class='dropdown-divider'></div>
						<a class='dropdown-item' href='index.php?cmd=logout'>Logout</a>
						<div class='dropdown-divider'></div>
						<a class='dropdown-item' href='../../index.php'>Frontend</a>
					</div>
				</div>

			<?php
			}



			//<!-- dropdown LOGIN Registar -->
			else { ?>
				<br>
		</div>
		<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#myModal'>Login</button>
		<a style='margin:5px;'></a>
		<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#REG'>Registar</button>

	<?php
			}
	?>
	</nav>

	<!-- -->
	<?php
	switch ($cmd) {

		case "indx":
			require('files/home.html');
			break;
		case "home":
			require('files/home.html');
			break;

			//conta
		case "logout":
			require('files/LOGINregi/logout.php');
			break;
		case "conta":
			require('files/conta.php');
			break;
		case "edit":
			require('files/edit.php');
			break;
		case "alte":
			require('files/alte.php');
			break;

		case "mudaPass":
			require('files/mudaPass.php');
			break;

			//Tipo Utilizadores
		case "TIPUlist":
			require('files/TIPU/listTIPU.php');
			break;
		case "TIPUadd":
			require('files/TIPU/formTIPU.html');
			break;
		case "TIPUins":
			require('files/TIPU/addTIPU.php');
			break;
		case "TIPUalt1":
			require('files/TIPU/faltTIPU.php');
			break;
		case "TIPUalt2":
			require('files/TIPU/alteTIPU.php');
			break;
		case "delTIPU":
			require('files/TIPU/delTIPU.php');
			break;

			//Utilizadores
		case "UTIlist":
			require('files/UTI/lisUTI.php');
			break;
		case "addUTI":
			require('files/UTI/formUTI.php');
			break;
		case "UTIins":
			require('files/UTI/addUTI.php');
			break;
		case "delUTI":
			require('files/UTI/delUTI.php');
			break;
		case "UTIalt1":
			require('files/UTI/faltUTI.php');
			break;
		case "UTIalt2":
			require('files/UTI/altUTI.php');
			break;
		case "UTIPR":
			require('files/UtilizadorPr/listUtiPr.php');
			break;
		case "delUTIPR":
			require('files/UtilizadorPr/UTIprdel.php');
			break;

			//SUGESTÕES
		case "SUGlist":
			require('files/SUG/listSUG.php');
			break;
		case "addSUG":
			require('files/SUG/formSUG.html');
			break;
		case "SUGins":
			require('files/SUG/addSUG.php');
			break;
		case "delSUG":
			require('files/SUG/delSUG.php');
			break;
		case "SUGalt1":
			require('files/SUG/faltSUG.php');
			break;
		case "SUGalt2":
			require('files/SUG/alteSUG.php');
			break;



			//JOGOS
		case "JOGlist":
			require('files/JG/listJG.php');
			break;
		case "addJOG":
			require('files/JG/formJG.php');
			break;
		case "JOGins":
			require('files/JG/addJG.php');
			break;
		case "delJOG":
			require('files/JG/delJG.php');
			break;
		case "altJOG1":
			require('files/JG/faltJG.php');
			break;
		case "altJOG2":
			require('files/JG/altJG.php');
			break;
		case "BGJG":
			require('files/JG/BGJG.php');
			break;
		case "BG":
			require('files/JG/Bg.php');
			break;
		case "TJlist":
			require('files/TJJ/listTJ.php');
			break;
		case "addTJ":
			require('files/TJJ/formTJ.html');
			break;
		case "TJins":
			require('files/TJJ/addTJ.php');
			break;
		case "delTJ":
			require('files/TJJ/delTJ.php');
			break;
		case "altTJ1":
			require('files/TJJ/faltTJ.php');
			break;
		case "altTJ2":
			require('files/TJJ/altTJ.php');
			break;

			//Plantaforma
		case "PLlist":
			require('files/PL/listPL.php');
			break;
		case "PLadd":
			require('files/PL/formPL.html');
			break;
		case "PLins":
			require('files/PL/addPL.php');
			break;
		case "PLalt1":
			require('files/PL/faltPL.php');
			break;
		case "PLalt2":
			require('files/PL/altePL.php');
			break;
		case "delPL":
			require('files/PL/delPL.php');
			break;

			//Plantaforma e JOGOS
		case "PJGlist":
			require('files/PJ/listPJ.php');
			break;
		case "addPJG":
			require('files/PJ/formPJ.html');
			break;
		case "PJGins":
			require('files/PJ/addPJ.php');
			break;
		case "delPJG":
			require('files/PJ/delPJ.php');
			break;
		case "PJGalt1":
			require('files/PJ/faltPJ.php');
			break;
		case "PJGalt2":
			require('files/PJ/altePJ.php');
			break;

			//Produtores
		case "PROElist":
			require('files/PR/listPR.php');
			break;
		case "addPROE":
			require('files/PR/formPR.html');
			break;
		case "PROEins":
			require('files/PR/addPR.php');
			break;
		case "delPROE":
			require('files/PR/delPR.php');
			break;
		case "altPROE1":
			require('files/PR/faltPR.php');
			break;
		case "altPROE2":
			require('files/PR/altPR.php');
			break;

			//Lista de desejos
		case "LDlist":
			require('files/LD/listLD.php');
			break;
		case "addLD":
			require('files/LD/formLD.html');
			break;
		case "LDins":
			require('files/LD/addLD.php');
			break;
		case "delLD":
			require('files/LD/delLD.php');
			break;
		case "altLD1":
			require('files/LD/faltLD.php');
			break;
		case "altLD2":
			require('files/LD/altLD.php');
			break;

			//login  registar
		case "logini":
			require('files/LOGINregi/log.php');
			break;
		case "reg":
			require('files/LOGINregi/registar.html');
			break;
		case "regi":
			require('files/LOGINregi/regi.php');
			break;
	}

	?>

	<div class='modal' id='myModal'>
		<form action="index.php?cmd=logini" method="post">

			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Login</h4>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
					</div>

					<div class="container">
						<center>
							<label for="uname"><b><br>Username</b></label>
							<input type="text" placeholder="Enter Username" name="uname" required>
							<br>
							<label for="psw"><b><br>Password</b></label>
							<input type="password" placeholder="Enter Password" name="psw" required>
							<br>
							<button class='btn btn-secondary' style='margin:5px;' type='submit'>Login</button>
							<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button></center>
					</div>

				</div>
			</div>
		</form>
	</div>

	<!--Registar-->

	<div class='modal' id='REG'>
		<form action="index.php?cmd=regi" method="post" onsubmit="return valida();">

			<div class='modal-dialog'>
				<div class='modal-content'>

					<div class='modal-header'>
						<h4 class='modal-title'>Registar</h4>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
					</div>

					<div class="container">
						<div class="form-group">
							<div class="col-sm-8"><b>Tipo de utilizador</b>
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

						<div class="col-xs-10">
							<div class="form-group"><b>Login</b><br>
								<input type="text" id="utiLog" name="utiLog" placeholder="GamerPT2005" onblur="return existe(this);" required>
								<div class="msg-erro" id='txtlogin'></div>
							</div>


							<div class="form-group"><b>Password</b><br>
								<input type="password" class="col-xs-4" id="pass" name="pass" onChange="PasswordMatch(this);" required></input><br>
								<span class='msg-erro msg-pass'></span>
							</div>

							<div class="form-group"><b>Repita a Password</b><br>
								<input type="password" id="confirm_password" name="confirm_password" onChange="PasswordMatch(this);" required>
								<span class='msg-erro msg-cpass'></span>
							</div>

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
							<span class='msg-erro msg-email'></span>
						</div>

						<div class='form-group'>
							<b>Pertencente a que Produtora</b>
							<select class='form-control prod' name='prod'>
								<option selected='selected'>--Escolha o Tipo de Utilizador--</option>
							</select>
						</div>

					</div>
				<span class='msg-erro msg-registo'></span>
				<div class="container">
					<button class='btn btn-secondary' style='margin:5px;' type='submit'>Registar</button>
					<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
				</div>
			</div>
	</div>
	</form>
	</div>

	<div class='modal' id='PASSW'>
		<form action="index.php?cmd=mudaPass" method="post" onsubmit="return altpassVAL(this);">
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<h4 class='modal-title'>Mudar a password</h4>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
					</div>

					<div class="container">
						<center><br>
							<div class="form-group"><b>Password</b>
								<input type="password" class="col-xs-4" id="altpass" name="altpass" onChange="return altPasswordMatch(this);" required></input><br>
								<span class='msg-erro msg-altpass'></span>
							</div>

							<div class="form-group"><b>Repita a Password</b>
								<input type="password" id="altconfirm_password" onChange="return altPasswordMatch(this);" required>
								<span class='msg-erro msg-altcpass'></span>
							</div>

							<p><span class='msg-erro msg-altpassVal'></span></p>

							<button class='btn btn-secondary' style='margin:5px;' type='submit'>alterar</button>
							<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
						</center>
					</div>
				</div>
			</div>
		</form>
	</div>



	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript" src="js/valida.js"></script>


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

	<script>
		$(document).ready(function() {
			$("#flip").click(function() {
				$("#panel").slideDown("slow");
			});
		});
	</script>


	<script type="text/javascript" src="js/alt.js"></script>

</body>

</html>