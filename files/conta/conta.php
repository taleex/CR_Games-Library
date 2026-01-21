<link href="../../css/cc.css" rel="stylesheet">

<?php
if ((isset($_SESSION['codtipoUti']))) {
	#-----Utilizador normal----#
	//USER
	$c = $_SESSION['codUti'];
	$sql = "select Utilizadores.*,Tipo_de_utilizador.*,Produtores.* from Utilizadores,Tipo_de_utilizador,Produtores where Utilizadores.codtipoUti=Tipo_de_utilizador.codtipoUti and Codigo_Produtor=empresa and codUti = $c";
	$res = $lig->query($sql);
	$lin = $res->fetch_array();

	//Quantos Jogos na Lista de desejos
	$sql2 = "select COUNT('CodigoJogo') AS numero FROM ListaDesejos where codigUti=$c";
	$res2 = $lig->query($sql2);
	$lin2 = $res2->fetch_array();
	//limit 5
	//Listar Lista de Desejos
	$sql1 = "select ListaDesejos.*,Jogos.*,Utilizadores.*,Produtores.* from Utilizadores,Jogos,ListaDesejos,Produtores where codUti=codigUti and CodigoJogo=Codigo_Jogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and codUti = $c ORDER BY Nome_Jogo limit 0,5";

	//Sugestões de generos random
	$sql6 = "select * FROM Tipo_de_Jogo	ORDER BY RAND( ) LIMIT 0 , 8";
	$res6 = $lig->query($sql6);
	$lin6 = $res6->fetch_array();

	//Sugerir JOGOs
	$sqlSugVE = "select * FROM sugestoes where CodUtil = $c and lido = '0'";
	$resSugVE = $lig->query($sqlSugVE);
	$linSugVE = $resSugVE->fetch_array();

	#----- FIM - Utilizador normal(adm/Pr tbm veem)----#


	#-----Utilizador ADM(13)----#
	//INFORMAÇÕES PARA O ADM
	//qnts utilizadores/JOGOS/Plantaformas/Produtores/Tipos de jogos e de utilizadores
	$sql13USER = "select COUNT(Utilizadores.codUti) as contas from Utilizadores";
	$res13USER = $lig->query($sql13USER);
	$lin13USER = $res13USER->fetch_array();

	$sql13TUSER = "select COUNT(Tipo_de_utilizador.codtipoUti) as tus from Tipo_de_utilizador";
	$res13TUSER = $lig->query($sql13TUSER);
	$lin13TUSER = $res13TUSER->fetch_array();

	$sql13JG = "select COUNT(Jogos.Codigo_Jogo) as JG from Jogos";
	$res13JG = $lig->query($sql13JG);
	$lin13JG = $res13JG->fetch_array();

	$sql13TJG = "select COUNT(Tipo_de_Jogo.CodTipoJogo) as TJG from Tipo_de_Jogo";
	$res13TJG = $lig->query($sql13TJG);
	$lin13TJG = $res13TJG->fetch_array();

	$sql13PL = "select COUNT(Plataforma.Codigo_Plataforma) as PL from Plataforma";
	$res13PL = $lig->query($sql13PL);
	$lin13PL = $res13PL->fetch_array();

	$sql13PR1 = "select COUNT(Produtores.Codigo_Produtor) as PR from Produtores";
	$res13PR1 = $lig->query($sql13PR1);
	$lin13PR1 = $res13PR1->fetch_array();

	//Qual Jogo que esta mais presente na lista de desejos dos utilizadores
	$sql13LD = "SELECT Nome_Jogo, COUNT( * ) AS cont FROM ListaDesejos, Jogos WHERE CodigoJogo = Codigo_Jogo GROUP BY CodigoJogo ORDER BY cont DESC";
	$res13LD = $lig->query($sql13LD);
	$lin13LD = $res13LD->fetch_array();

	//Qual a produtora com mais jogos
	$sql13PR = "SELECT Nome_Produtor, COUNT( * ) AS cont FROM Produtores, Jogos WHERE Produtores.Codigo_Produtor= Jogos.Codigo_Produtor GROUP BY Produtores.Codigo_Produtor ORDER BY cont DESC";
	$res13PR = $lig->query($sql13PR);
	$lin13PR = $res13PR->fetch_array();

	//Qual a plataforma com mais jogos 
	$sql13PJ = "SELECT Nome_Plataforma, COUNT( * ) AS cont FROM Plataforma,JogosPlataforma,Jogos WHERE Codigo_Plataforma= CodigoPlataforma and CodigoJogo=Codigo_Jogo GROUP BY Codigo_Plataforma ORDER BY cont DESC";
	$res13PJ = $lig->query($sql13PJ);
	$lin13PJ = $res13PJ->fetch_array();

	//Mostrar Sugestões
	$sql13Sug = "select sugestoes.*, Utilizadores.* FROM sugestoes,Utilizadores where CodUtil=codUti and lido='0' limit 0,1";
	#----- FIM Utilizador ADM (APENAS ADM)----#

	#-----Utilizador PR(12)----#
	//INFORMAÇÕES PARA O Pr
	//qnts utilizadores/JOGOS/Plantaformas/Produtores/Tipos de jogos e de utilizadores
	if (($_SESSION['codtipoUti'] == '12')) {
		$sql12USER = "select COUNT(Utilizadores.codUti) as cnt from Utilizadores,Produtores where empresa LIKE codigo_Produtor and codigo_Produtor like $pr";
		$res12USER = $lig->query($sql12USER);
		$lin12USER = $res12USER->fetch_array();

		$sql12JG = "select COUNT(Jogos.Codigo_Jogo) as JG from Jogos,Produtores where Jogos.Codigo_Produtor like Produtores.Codigo_Produtor and Produtores.codigo_Produtor like $pr";
		$res12JG = $lig->query($sql12JG);
		$lin12JG = $res12JG->fetch_array();

		$sql12TJG = "select COUNT(Tipo_de_Jogo.CodTipoJogo) as TJG from Tipo_de_Jogo,Jogos,Produtores where Jogos.CodTipoJogo=Tipo_de_Jogo.CodTipoJogo and Jogos.Codigo_Produtor like Produtores.Codigo_Produtor and Produtores.codigo_Produtor like $pr ";
		$res12TJG = $lig->query($sql12TJG);
		$lin12TJG = $res12TJG->fetch_array();

		$sql12PL = "select COUNT(Codigo_Jogo) as PL from Plataforma,Jogos,Produtores,JogosPlataforma where CodigoJogo = Codigo_Jogo and Codigo_Plataforma = CodigoPlataforma and Jogos.Codigo_Produtor like Produtores.Codigo_Produtor and Produtores.codigo_Produtor like $pr";
		$res12PL = $lig->query($sql12PL);
		$lin12PL = $res12PL->fetch_array();

		//Qual Jogo que esta mais presente na lista de desejos dos utilizadores
		$sql12LD = "SELECT Nome_Jogo, COUNT( * ) AS cont FROM ListaDesejos,Jogos,Produtores WHERE Jogos.Codigo_Produtor like Produtores.Codigo_Produtor and CodigoJogo = Codigo_Jogo and Produtores.codigo_Produtor like $pr GROUP BY CodigoJogo ORDER BY cont DESC";
		$res12LD = $lig->query($sql12LD);
		$lin12LD = $res12LD->fetch_array();

		//Qual a plataforma com mais jogos 
		$sql12PJ = "SELECT Nome_Plataforma, COUNT( * ) AS cont FROM Plataforma,JogosPlataforma,Jogos,Produtores WHERE Jogos.Codigo_Produtor like Produtores.Codigo_Produtor and Codigo_Plataforma= CodigoPlataforma and CodigoJogo=Codigo_Jogo and Produtores.codigo_Produtor like $pr GROUP BY Codigo_Plataforma ORDER BY cont DESC";
		$res12PJ = $lig->query($sql12PJ);
		$lin12PJ = $res12PJ->fetch_array();
	}

	#-----Utilizador PR(APENAS PR)----#

?>


	<section id="bc">
		<section class="wow fadeInUp">
			<br><br><br><br>
			<div class="container">
				<div class="row my-2">
					<div class="col-lg-8 order-lg-2">
						<!-- Nav Bar-->
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
							</li>
							<li class="nav-item">
								<a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
							</li>
							<?php if (($_SESSION['codtipoUti'] == '13')) { ?>
								<li class="nav-item">
									<a href="" data-target="#Sobre" data-toggle="tab" class="nav-link">Informações para o Administrador</a>
								</li>
							<?php }
							if (($_SESSION['codtipoUti'] == '12')) { ?>
								<li class="nav-item">
									<a href="" data-target="#pr" data-toggle="tab" class="nav-link">Informações para Produtores</a>
								</li>
							<?php } ?>
							<li class="nav-item">
								<a href="" data-target="#sug" data-toggle="tab" class="nav-link">Sugerir Jogos</a>
							</li>
						</ul>

						<div class="tab-content py-4">
							<!-- Profile -->
							<div class="tab-pane active" id="profile">
								<h5 class="mb-3" style="color:White;"><b><?php echo $lin['Nome_Utilizador']; ?></b></h5>
								<div class="row">
									<div class="col-md-6">
										<h6 style="color:#f82249"><b><?php echo $lin['dsg']; ?></b> <?php if (($_SESSION['codtipoUti'] == '12')) echo "<b style='color:White'>da </b><b><a href='index.php?cmd=PRlist&cod=" . $linpr['Codigo_Produtor'] . "'>" . $linpr['Nome_Produtor'] . "</a></b>"; ?></h6>
									</div>
									<div class="col-md-6">
										<h6 style="color: White"><b>Sugestões de Generos de Jogos</b></h6>
										<?php
										if ($result6 = mysqli_query($lig, $sql6)) {
											while ($lin6 = mysqli_fetch_array($result6)) { ?>
												<a style="background-color:White; color:#f82249;" href="index.php?cmd=TJlist&cod=<?php echo $lin6['CodTipoJogo']; ?>" class="badge badge-dark badge-pill"><?php echo $lin6['Genero']; ?></a>
										<?php
											}
										}
										?>
										<hr>
										<span class="badge badge-danger"><i class="fa fa-gamepad"></i> O Utilizador tem: <?php echo $lin2['numero']; ?> Jogos na Lista de Desejos </span>
									</div>
									<div class="col-md-12">
										<h5 class="mt-2" style="color:White"><span class="fa fa-gamepad float-right"></span><b> Lista de desejos</b></h5>
										<table class="table table-sm table-hover table-striped">
											<tbody>
												<?php if ($result1 = mysqli_query($lig, $sql1)) {
													while ($lin1 = mysqli_fetch_array($result1)) { ?>
														<tr>
															<td>
																<strong style="color:#f82249">
																	<a href='index.php?cmd=JGinf&cod=<?php echo $lin1['Codigo_Jogo']; ?>'><?php echo $lin1['Nome_Jogo']; ?></a>
																</strong>
																<b style="color:White"> produzido por: </b>
																<strong style="color:#f82249">
																	<a href='index.php?cmd=PRlist&cod=<?php echo $lin1['Codigo_Produtor']; ?>'>
																		<?php echo $lin1['Nome_Produtor']; ?></a>
																</strong>
																<?php echo "<span style='color:White' class='fa fa-minus-circle' onclick='return lid(this,$lin1[Codigo_Jogo],$c);'></span>"; ?>
															</td>
														</tr>
												<?php }
												} else {
													echo "<strong style='color:#f82249'>Não foi encontrado resultados</strong>";
												} ?>
											</tbody>
										</table>
										<?php if ($lin2['numero'] > 5) { ?>
											<strong><a style="color:White" href='index.php?cmd=LDlist&cod=<?php echo $c; ?>'>Ver Tudo</a></strong>
										<?php } ?>
									</div>
								</div>
								<!--/row-->
							</div>

							<!-- Apenas para o Adm -->
							<?php if (($_SESSION['codtipoUti'] == '13')) { ?>
								<div class="tab-pane" id="Sobre">
									<table>
										<tr>
											<h5>
												<!-- Span de conts -->
												<span class="badge badge-primary"><i class="fa fa-user"></i> <?php echo $lin13USER['contas']; ?> Utilizadores </span>
												<span class="badge badge-primary"><i class="fa fa-address-card"></i> <?php echo $lin13TUSER['tus']; ?> Tipos de Utilizadores </span><br>
												<span class="badge badge-danger"><i class="fa fa-gamepad"></i> <?php echo $lin13JG['JG']; ?> Jogos </span>
												<span class="badge badge-danger"><i class="fa fa-book"></i> <?php echo $lin13TJG['TJG']; ?> Generos de jogos </span><br>
												<span class="badge badge-danger"><i class="fa fa-archive"></i> <?php echo $lin13PR1['PR']; ?> Produtores </span>
												<span class="badge badge-danger"><i class="fa fa-laptop"></i> <?php echo $lin13PL['PL']; ?> Plataformas </span><br>
												<span class="badge badge-info"><i class="fa fa-laptop"></i> Jogo com mais desejos: <?php echo $lin13LD['Nome_Jogo']; ?></span><br>
												<span class="badge badge-info"><i class="fa fa-laptop"></i> Plataforma com mais jogos: <?php echo $lin13PJ['Nome_Plataforma']; ?></span><br>
												<span class="badge badge-info"><i class="fa fa-laptop"></i> Produtor com mais jogos: <?php echo $lin13PR['Nome_Produtor']; ?></span><br><br>
											</h5>
										</tr>
									</table>

									<!-- Adiciona e Apagar video da home page -->

									<form enctype="multipart/form-data" action="index.php?cmd=vd" method="post">
										<label class="custom-file">
											<input type="file" id="file" class="custom-file-input" name="img">
											<span class="custom-file-control" style="color:white">Escolha o video</span><br>
											<button class="btn btn-danger" type="submit">Carregar</button>
											<a href="index.php?cmd=delvd" class="btn btn-secondary">Apagar</a>
										</label>
									</form>
									<br>
									<?php if ($result13Sug = mysqli_query($lig, $sql13Sug)) {
										while ($lin13Sug = mysqli_fetch_array($result13Sug)) { ?>
											<div id="sug1" class="alert alert-danger alert-dismissable">
												<a class="panel-close close" data-dismiss="alert">×</a> <strong> <?php echo $lin13Sug['Login']; ?></strong> sugeriu <?php echo "<strong>" . $lin13Sug['sugesta'] . "</strong> de <strong>" . $lin13Sug['NomePr'] . "</strong>"; ?>.
												<?php echo "<span style='color:Black' class='fa fa-minus-circle' onclick='return su(this,$lin13Sug[Codigo_Sugestao]);'></span>"; ?>
											</div>
									<?php }
									} ?>
									<table class="table table-hover table-striped">
										<tbody>
											<tr>
												<td>
													<span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							<?php } ?>

							<!-- Apenas para Produtores -->
							<?php if (($_SESSION['codtipoUti'] == '12')) { ?>
								<div class="tab-pane" id="pr">
									<table>
										<tr>
											<h5>
												<!-- Span de conts -->
												<span class="badge badge-primary"><i class="fa fa-user"></i> <?php echo $lin12USER['cnt']; ?> Utilizadores </span><br>
												<span class="badge badge-danger"><i class="fa fa-gamepad"></i> <?php echo $lin12JG['JG']; ?> Jogos </span><br>
												<span class="badge badge-danger"><i class="fa fa-book"></i> <?php echo $lin12TJG['TJG']; ?> Generos de jogos </span><br>
												<span class="badge badge-danger"><i class="fa fa-laptop"></i> <?php echo $lin12PL['PL']; ?> Plataformas com jogos da <?php echo $linpr['Nome_Produtor']; ?> </span><br>
												<span class="badge badge-info"><i class="fa fa-laptop"></i> Jogo com mais desejos: <?php echo $lin12LD['Nome_Jogo']; ?></span><br>
												<span class="badge badge-info"><i class="fa fa-laptop"></i> Plataforma com mais jogos: <?php echo $lin12PJ['Nome_Plataforma']; ?></span><br>
												<br><br>
											</h5>
										</tr>
									</table>
								</div>
							<?php } ?>

							<!-- Editar dados de Utilizador -->
							<div class="tab-pane" id="edit" style="color:White;">
								<form action="index.php?cmd=alt" method="POST" role="form" onsubmit="return altvalida();">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Username</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" id="Loginalt" name="Loginalt" required value="<?php echo $lin['Login']; ?>" onblur="return altexiste(this,<?php echo $c;?>);">
											<div class="msg-erro" id='altxtlogin'></div>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Nome(Primeiro e ultimo)</label>
										<div class="col-lg-9">
											<input class="form-control" type="text" id="altutinome" name="altutinome" required value="<?php echo $lin['Nome_Utilizador']; ?>" onblur="return altvalidaNom(this);">
											<span class='msg-erro altmsg-nome'></span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Email</label>
										<div class="col-lg-9">
											<input class="form-control" name="altemail" id="altemail" type="email" required value="<?php echo $lin['email']; ?>" onblur="return altvalidaMail(this);">
											<span class='msg-erro altmsg-email'></span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Data de Nascimento</label>
										<div class="col-lg-9">
											<input type="date" class="form-control" id="altnasc" name="altnasc" value="<?php echo $lin['nasc']; ?>">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Password</label>
										<div class="col-lg-9">
											<input type="password" class="form-control" id="altpass" name="altpass" onChange="altPasswordMatch(this);" required>
											<span class='msg-erro altmsg-pass'></span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label">Repita a Password</label>
										<div class="col-lg-9">
											<input type="password" class="form-control" id="altconfirm_password" name="altconfirm_password" onChange="altPasswordMatch(this);" required>
											<span class='msg-erro altmsg-cpass'></span>
										</div>
									</div>

									<span class='msg-erro altmsg-registo'></span>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label form-control-label"></label>
										<div class="col-lg-9">
											<!--<a data-toggle="modal" data-target="#ALT">Login</a>-->
											<input type="reset" class="btn btn-secondary" value="Cancel">
											<input type="submit" class="btn btn-danger" value="Alterar">
										</div>
									</div>
								</form>
							</div>

							<!-- Sugestão -->
							<div class="tab-pane" id="sug" style="color:White;">
								<?php if (($linSugVE['lido'] != NULL) && ($linSugVE['lido'] == 0)) { ?>
									<div id="sug2">
										<div class="alert alert-danger alert-dismissable">
											<strong><?php echo $linSugVE['Login']; ?></strong> sugeriu <?php echo "<strong>" . $linSugVE['sugesta'] . "</strong> de <strong>" . $linSugVE['NomePr'] . "</strong>"; ?>
											<?php echo "<span style='color:Black' class='fa fa-minus-circle' onclick='return su2(this," . $linSugVE['Codigo_Sugestao'] . ")'></span>"; ?>
											<br><br>

											Para o utilizador sugerir um novo jogo precisa de esperar que esta sugestão seja analisada ou se eliminar a sugestão que fez anteriormente.<br>
										</div>
									</div>
								<?php } else { ?>
									<form action="index.php?cmd=addSug" method="POST" role="form" onsubmit="return validaSUG();">
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label">Nome de Jogo</label>
											<div class="col-lg-9">
												<input class="form-control" type="text" id="sugN" name="sugN" value="" required onblur="return existeSug(this);">
												<div class="msg-erro" id='txtSug'></div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label">Nome de Produtor</label>
											<div class="col-lg-9">
												<input class="form-control" type="text" id="sugPr" name="sugPr" value="" required onblur="return validPR(this);">
												<span class='msg-erro msg-pr'></span>
											</div>
										</div>
										<span class='msg-erro msg-sug'></span>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label form-control-label"></label>
											<div class="col-lg-9">
												<input type="submit" class="btn btn-danger" value="enviar">
											</div>
										</div>
									</form>
								<?php } ?>
							</div>
						</div>
						<!-- FIM DA NAV BAR -->
					</div>
					<!-- Foto de Utilizador -->
					<div class="col-lg-4 order-lg-1 text-center"><br>
						<img src="<?php echo  $_SESSION['foto'] ?>" width='300' height='200' class="mx-auto img-fluid img-circle d-block" alt="avatar">
						<form enctype="multipart/form-data" action="index.php?cmd=ft" method="post" onsubmit="return checkFile()">
							<label class="custom-file">
								<input type="file" id="file1" class="custom-file-input" name="img">
								<span class="custom-file-control" style="color:white">Escolha a foto</span><br>
								<button class="btn btn-danger" type="submit">Carregar</button>
								<a href="index.php?cmd=delft" class="btn btn-secondary">Apagar</a>
							</label>
						</form>

					</div>


				</div>
			</div>
		</section>
	</section>

	<!-- Confirmação da Password quando altera os dados de utilizador (ainda n esta feito) -->
	<div class="modal fade" id="ALT" role="dialog">
		<form action="index.php?cmd=logini" method="post">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="Modal">
						<div class="modal-header">
							<b>
								<h4 class="modal-title" style="color:#ffffff;">Confirmação</h4>
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
						<button type='button' class='btn btn-danger' id='ola' data-dismiss='modal'>Close</button></center>
					</div>
				</div>
			</div>
		</form>
	</div>

	<!-- Caso o utilizador nao esteja registado, evita assim que coloquem no url "conta" e consigam aceder a esta pagina -->
<?php } else {
	echo "<div style='background-color:#a11212'>";
	for ($i = 0; $i < 12; $i++) {
		echo "<br>";
	}
	echo "<center><h1 style='color:white'>Precisa de fazer Login para poder ver a sua conta</h1>
	<br><h3 style='color:white'>Em 10 segundos a pagina será redirecionada para a HomePage</h3>";
	for ($i = 0; $i < 20; $i++) {
		echo "<br>";
	}
	echo "</div>";
	echo "<meta http-equiv=refresh content=10;URL=index.php?cmd=home>";
} ?>

<!-- Toast for file validation -->
<div class="toast" id="fileToast" style="position: fixed; top: 20px; right: 20px; z-index: 9999;" data-delay="3000">
    <div class="toast-header">
        <strong class="mr-auto">Aviso</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body">
        Por favor, carregue uma imagem antes de submeter.
    </div>
</div>

<!-- Adicionar ou remover o jogo da lista de desejos -->
<script type="text/javascript" src="js/fil.js"></script>
<script src="js/sug.js"></script>
<script src="js/alt.js"></script>
<script>
function checkFile() {
    var fileInput = document.getElementById('file1');
    if (fileInput.files.length === 0) {
        $('#fileToast').toast('show');
        return false;
    }
    return true;
}
</script>
