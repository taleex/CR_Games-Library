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
  <div class="container">

    <?php for ($i = 0; $i < 2; $i++) echo "<br>"; ?>
    <div style="background-color:rgba(0, 0, 0, 0.5);" class="game-info-card">
      <div class="game-image-container">
        <?php echo "<img src=" . 'backoffice/3P2/' . $lin['IMGjg'] . " alt='" . $lin['Nome_Jogo'] . "' class='game-main-image'>"; ?>
      </div>
      <div class="game-info-content">
        <h4 style="color: White; text-align: center;"><b><?php echo $lin['Nome_Jogo']; ?> de <a href='index.php?cmd=PRlist&cod=<?php echo $lin['Codigo_Produtor']; ?>'><?php echo $lin['Nome_Produtor']; ?> </a></b></h4>
        <div class="game-details-grid">
          <div class="detail-item">
            <span class="detail-label">Genero:</span>
            <span class="detail-value"><a href='index.php?cmd=TJlist&cod=<?php echo $lin['CodTipoJogo']; ?>'><?php echo $lin['Genero']; ?></a></span>
          </div>
          <div class="detail-item">
            <span class="detail-label">Data de Lancamento:</span>
            <span class="detail-value"><?php echo $lin['Data']; ?></span>
          </div>
          <div class="detail-item">
            <span class="detail-label">Preço:</span>
            <span class="detail-value">
              <?php if($lin['Preco'] == '0') echo "<b style='color:#f82249;'>Grátis</b>"; else echo $lin['Preco']." €"; ?>
            </span>
          </div>
          <div class="detail-item">
            <span class="detail-label">Descrição:</span>
            <span class="detail-value"><?php echo $lin['descricao']; ?></span>
          </div>
        </div>
        <div class="platforms-container">
          <?php if ($res1 = mysqli_query($lig, $sql1)) {
            while ($lin1 = mysqli_fetch_array($res1)) { ?>
              <a style="background-color:White; color:#f82249; margin:3px;" href="index.php?cmd=PLlist&cod=<?php echo $lin1['Codigo_Plataforma']; ?>" class="badge badge-dark badge-pill"><?php echo $lin1['Nome_Plataforma']; ?></a>
          <?php }
          } ?>
        </div>
      </div>
    </div>

    <?php
    if ($resug = $lig->query($sqlsug)) {
      if ($resug->num_rows > 0) { ?>

        <section id="speakers" class="wow fadeInUp">
          <div class="container">
            <h3 style="border-radius: 25px;background-color: White;color: #f82249"><center><a style="margin: 15px;"></a><b>Outros Jogos da franquia</b></center></h3>

            <div class="row">

              <?php while ($linsug = $resug->fetch_array()) { ?>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="speaker">
                    <?php
                    echo "<img src=" . 'backoffice/3P2/' . $linsug['IMGjg'] . "  height='200' width='350' alt='Speaker 1'/>
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