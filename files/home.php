<?php
$sql13JG = "select COUNT(Jogos.Codigo_Jogo) as JG from Jogos";
$res13JG = $lig->query($sql13JG);
$lin13JG = $res13JG->fetch_array();
?>

<!--==========================
    Intro Section
  ============================-->
<section id="intro">
  <div class="intro-container wow fadeIn">
    <h1 class="mb-4 pb-0"><span>Games</span> Library<br></h1>
    <p class="mb-4 pb-0">Vem conhecer novos jogos no nosso site, Adiciona os teus jogos favoritos a tua lista de
      desejos<br><a style="color:#f82249;">Esperemos que goste do nosso site </a></p>


    <?php
    $filename = './backoffice/3P2/files/IMG/video.mp4';

    if (file_exists($filename)) {
      echo "The file $filename exists";
    ?>
      <a data-toggle="modal" class=" play-btn mb-4 fa-spin" data-target="#video"></a>


      <!-- Modal Video -->
      <div class="modal fade" id="video" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="Modal">
              <div class="modal-header">
                <b>
                  <h4 class="modal-title" style="color:#ffffff;">Como usar este site</h4>
                </b>
                <button type="button" class="close" data-dismiss="modal" onclick="pauseVid()">&times;</button>
              </div>
            </div>
            <div class="modal-body">
              <video id="vd" width="700" controls>
                <source src="./backoffice/3P2/files/IMG/video.mp4" type="video/mp4" data-vbtype="video">
                <source src="./backoffice/3P2/files/IMG/video.ogg" type="video/ogg" data-vbtype="video">
              </video>
            </div>

            <div class="modal-footer">
              <button type='button' class='btn btn-secundary' onclick="playVid()">Play</button>
              <button type='button' class='btn btn-danger' data-dismiss='modal' onclick="pauseVid()">Close</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    <?php } ?>

    <!-- Queria que funciona-se mas ainda nao da
    <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4 fa-spin" data-vbtype="video"
      data-autoplay="true"></a>-->


    <a href="#about" class="about-btn scrollto">Sobre o site</a>
  </div>
</section>



<main id="main">

  <!--==========================
      About Section
    ============================-->
  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2>Games Library</h2>
          <p>Este site tem como utilidade dar a conhecer novos jogos e guardar-los aos favoritos ou até mesmo os que tem
            em interesse.<br>
            <h3> Qual a utilidade deste site?</h3>Para uma pessoa que goste de registar tudo o que ja viu por exemplo de
            animes, filmes ou series mas nunca tinha registado sobre jogos que ja jogou, porque não tinha conhecimento
            de sites que o permitiam fazer isso, bem com este site para alem de poder conhecer mais jogos tambem poderá
            fazer a sua lista de jogos favoritos ou ja jogados
          </p>
        </div>
        <div class="col-lg-3">
        </div>
        <div class="col-lg-3">
          <h3>Este projeto foi iniciado</h3>
          <p>4 de Dezembro de 2019</p>
        </div>
      </div>
    </div>
  </section>
</main>
<!--==========================
    Footer
  ============================-->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-info">
          <img src="img/logo.png" alt="TheEvenet">
          <p>Este site tem no momento <?php echo $lin13JG['JG']; ?> Jogos registados, que o utilizador poderá explorar,
            assim conhecendo melhor este mundo dos video jogos. </p>
        </div>
        <div class="col-lg-6 col-md-6 footer-links">
          <h4>Quer registar a sua empresa no nosso site?</h4>
          <?php if ((isset($_SESSION['codtipoUti']))) {


            $sql1 = "select * from Utilizadores where codUti = ".$_SESSION['codUti']."";
            $res1 = $lig->query($sql1);
            $lin1 = $res1->fetch_array();
            if ($lin1['comprovativo'] === NULL) {
          ?>

              <form enctype="multipart/form-data" action="index.php?cmd=em" method="post">

                <div class="form-group">
                  <input type="email" class="form-control" name="em" aria-describedby="emailHelp" placeholder="Enter email" value=" <?php echo $_SESSION['email']; ?>" required>
                </div>

                <div class="form-group">
                  <label><b>Nome de Produtora</b></label>
                  <input type="text" class="form-control" name="pr" aria-describedby="emailHelp" placeholder="Nome de PROD" required>
                </div>

                <!-- Foto de Utilizador -->
                <div class="form-group">
                  <label><b>Comprovativo de que pertence a empresa</b></label>
                  <input type="hidden" name="MAX_FILE_SIZE" value="300000000">
                  <input type="file" class="form-control" required="" id="imgjg" placeholder="Foto de jogo" name="img" required>
                </div>

                <input type="submit" class="btn btn-danger" name="Enviar" value="Enviar" />
              </form>

            <?php } else { ?>
              <div class="alert alert-secondary" role="alert">
                <b> Já enviou um pedido por favor espere </b>
              </div>
            <?php } } else {
            ?>
            <div class="alert alert-secondary" role="alert">
              <b> Para registar a sua empresa deverá criar conta
                e iniciar sessão</b>
            </div>
          <?php }  ?>
        </div>


        <div class="col-lg-3 col-md-6 footer-contact">
          <h4>Contact Us</h4>
          <p>
            <strong>Email:</strong> adm.gameslibrary@gmail.com<br>
          </p>

          <div class="social-links">
            <a href="https://twitter.com/GamesLibrary_" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="https://www.facebook.com/Games-Library-101249941530736/?hc_ref=ARRPtU2zdN03Oa_TD_5b1ZtxOx4njdUhmOKt4WOB_4Tv_g7eyLFkyg3YDCG9sa1jkXk&fref=nf&__xts__%5B0%5D=68.ARDkqwE1ddt5_9AEhoaQWX_hw9QlbK9QYvD57xHT-FJ0ObgZ2g2dsS_YQE3XNV3tKzhO6j3vqd2r8b2aH7N_47jw8-EupEXQEWX8eFRxGtBjOSQQZKBIV1iyHxjUazHMD12ByGKkwKEzPgDGMa27skjKxJSyG4dRp69KOb2A9l6HsZGIK6YsdGKk-OMIxjTPbwzWx2OPzZmNN4h2rR77Omx7f3Xt-SD9QPhdhqPoL27aO_34HlUyCNJWa2P2vY48KG6HdOOBSdxdStEp5yZ1lg9_UduRBWAsK8e-7vyPWkiQ243Egcf-iwImSGN5ov_j4mpb2Gx74qkMZx_wzqqWUZ0&__tn__=kC-R" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/gameslibrary_vrd/" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<script>
  var vid = document.getElementById("vd");

  function playVid() {
    vid.play();
  }

  function pauseVid() {
    vid.pause();
  }
</script>