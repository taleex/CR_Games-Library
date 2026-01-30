<?php
$c = $_REQUEST['cod'];
$sql = "select DATE_FORMAT(DataLancamento, '%d-%m-%Y' ) as  Data,Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Codigo_Jogo = $c";
$res = $lig->query($sql);
$lin = $res->fetch_array();

$a =  $lin['Nome_Jogo'];

$sql1 = "select Jogos.*,Plataforma.*,JogosPlataforma.* from Jogos,JogosPlataforma,Plataforma where CodigoPlataforma=	Codigo_Plataforma and Codigo_Jogo = CodigoJogo  and Codigo_Jogo = $c";

$sqlsug = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Produtores.Codigo_Produtor like ".$lin['Codigo_Produtor']." and Nome_Jogo like '" . strtok($a, " ") . "%' and Nome_Jogo not like '" . $lin['Nome_Jogo'] . "'";
?>

<style>
  .full-height {
    background: url('<?php echo "backoffice/3P2/$lin[JGbg]"; ?>');
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    /* Set rules to fill background */
    min-height: 100%;
    min-width: 1024px;

    /* Set up proportionate scaling */
    width: 100%;
    height: auto;

    /* Set up positioning */
    position: fixed;
    top: 0;
    left: 0;
  }
</style>

<!--==========================
      Speaker Details Section
    ============================-->
<section id="speakers-details" class="wow fadeIn full-height">
  <div class="container" style="padding-top: 20px; padding-bottom: 20px;">

    <?php for ($i = 0; $i < 2; $i++) echo "<br>"; ?>
    <div style="background-color:rgba(0, 0, 0, 0.5);" class="card flex-md-row mb-4 box-shadow h-md-250" style="margin: 0 15px; padding: 15px;">
      <div class="card-body d-flex flex-column align-items-start">
        <h4 style="color: White"><b><?php echo $lin['Nome_Jogo']; ?> de <a href='index.php?cmd=PRlist&cod=<?php echo $lin['Codigo_Produtor']; ?>'><?php echo $lin['Nome_Produtor']; ?> </a></b></h4>
        <h6 style="color: White"><b>Genero: <a href='index.php?cmd=TJlist&cod=<?php echo $lin['CodTipoJogo']; ?>'><?php echo $lin['Genero']; ?></a></b></h6>
        <h6 style="color: White"><b>Data de Lancamento: <?php echo $lin['Data']; ?></b></h6>
        <h6 style="color: White"><b>Preço: <?php if($lin['Preco'] == '0') echo "<b  style='color:#f82249;'>Grátis</b>"; else echo $lin['Preco']." €"; ?></b></h6>
        <h6 style="color: White"><b>Descrição: <?php echo $lin['descricao']; ?></b></h6>
        <div>
          <?php if ($res1 = mysqli_query($lig, $sql1)) {
            while ($lin1 = mysqli_fetch_array($res1)) { ?>
              <a style="background-color:White; color:#f82249; margin:3px;" href="index.php?cmd=PLlist&cod=<?php echo $lin1['Codigo_Plataforma']; ?>" class="badge badge-dark badge-pill"><?php echo $lin1['Nome_Plataforma']; ?></a>
          <?php }
          } ?>
        </div>
      </div>
      <img src="<?php echo 'backoffice/3P2/' . $lin['IMGjg']; ?>" alt="<?php echo $lin['Nome_Jogo']; ?>" class="img-fluid game-image-responsive" style="width: 100%; height: 350px; object-fit: cover;">
    </div>

    <?php
    if ($resug = $lig->query($sqlsug)) {
      if ($resug->num_rows > 0) { ?>

        <section id="speakers" class="wow fadeInUp">
          <div class="container">
            <h3 style="border-radius: 25px;background-color: White;color: #f82249"><center><a style="margin: 15px;"></a><b>Outros Jogos da franquia</b></center></h3>

            <div class="row" style="margin: 0 -15px;">

              <?php while ($linsug = $resug->fetch_array()) { ?>
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding: 0 15px;">
                  <div class="speaker" style="margin-bottom: 20px;">
                    <?php
                    echo "<img src='" . 'backoffice/3P2/' . $linsug['IMGjg'] . "' alt='" . $linsug['Nome_Jogo'] . "' class='img-fluid game-image-responsive' style='width: 100%; height: 200px; object-fit: cover;'/>
                        <div class='details' style='background-color: rgba(255, 0, 0, 0.5);'>";
                    echo "<h3><a href='index.php?cmd=JGinf&cod=$linsug[Codigo_Jogo]'>" . $linsug['Nome_Jogo'] . "</a>";
                    echo "<p><a href='index.php?cmd=PRlist&cod=" . $linsug['Codigo_Produtor'] . "'>" . $linsug['Nome_Produtor'] . "</a></p>";
                    ?>
                  </div>
                </div>
            </div>
          <?php } ?>
          </div>
        </section>

    <?php }
    } ?>

  </div>
</section>