<link href="../../css/my.css" rel="stylesheet">
<?php
if ((isset($_SESSION['codtipoUti']))) {
  $tp = 6;
  if (isset($_REQUEST['pag']))
    $np = $_REQUEST['pag'];
  else
    $np = 1;
  $ini = ($np - 1) * $tp;

  if ((isset($_REQUEST['pesquisa'])) && ($_REQUEST['pesquisa'] != '')) {
    $filtro1 = $_REQUEST['pesquisa'];
    $filtro = $_REQUEST['pesquisa'];
    $filtro = '%' . $filtro . '%';
  } else $filtro = '';

  if ($filtro != '')
    $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.*,ListaDesejos.* from Tipo_de_Jogo,Produtores,Jogos,ListaDesejos where CodigoJogo = Codigo_Jogo and Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and codigUti = $c and Nome_Jogo like CONCAT('%',$filtro1,'%') order by Codigo_Jogo";
  else
    $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.*,ListaDesejos.* from Tipo_de_Jogo,Produtores,Jogos,ListaDesejos where CodigoJogo = Codigo_Jogo and Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and codigUti = $c order by Codigo_Jogo";

  $res = $lig->query($sql);
  $nr = $res->num_rows;
  $qp = $nr / $tp + 1;

  if ($filtro != '')
    $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.*,ListaDesejos.* from Tipo_de_Jogo,Produtores,Jogos,ListaDesejos where CodigoJogo = Codigo_Jogo and Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and codigUti = $c and Nome_Jogo like CONCAT('%',$filtro1,'%') order by Codigo_Jogo limit $ini, $tp";
  else {
    $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.*,ListaDesejos.* from Tipo_de_Jogo,Produtores,Jogos,ListaDesejos where CodigoJogo = Codigo_Jogo and Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and codigUti = $c limit $ini, $tp";
  }
  $res = $lig->query($sql);

  $pagtd = 4;


  $c = $_SESSION['codUti'];

  //Listar Lista de Desejos


  if ($result = $lig->query($sql)) {
    if ($result->num_rows > 0) { ?>

      <!--==========================
      Listar Jogos desejos
    ============================-->

      <section id="bc" class="full-height">
        <section id="speakers" class="wow fadeInUp">
          <div class="section-header"><br>
            <h2 style="color: #d12141">Lista de Desejos</h2>
            <br>

            <?php if ((isset($_SESSION['codtipoUti']))) {


            ?>
              <center>
                <div class="col-sm-3 col-md-3 col-lg-3">
                  <input type="text" class="form-control" id="pesq" name="pesquisa" onInput="return filJogosLd(this,<?php echo $c; ?>,<?php echo $pagtd; ?>);">
                </div>
                <br>

              </center><br>

            <?php } else { ?>

              <center>
                <div class="col-sm-3 col-md-3 col-lg-3">
                  <input type="text" class="form-control" id="pesq" name="pesquisa" onInput="return filTodosJogosSemSessao(this,<?php echo $pagtd; ?>);">
                </div>
                <br>

              </center><br>


            <?php }
            if ($filtro != '')
              echo "<center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=LDlist>Listar todos os Jogos</a></center><br>"; ?>


            <center>
              <?php for ($i = 1; $i < $qp; $i++)
                echo "<b><a href=index.php?cmd=LDlist&cod=$c&pag=$i>&nbsp$i&nbsp</a></b>"; ?>
            </center>
          </div>
          <!-- fazer a paginação funcionar no ajax sff -->

          <div class="container" id="ld">
            <div class="row">
              <?php
              while ($row = $result->fetch_array()) {
              ?>

                <div class="col-lg-4 col-md-4 col-sm-8">
                  <div class="speaker">
                    <?php echo "<img src=" . 'backoffice/3P2/' . $row['IMGjg'] . " height='200' width='350' alt='Speaker 1'/>
              <div class='details' style='background-color: rgba(255, 0, 0, 0.5);'>";
                    echo "<h3><a href='index.php?cmd=JGinf&cod=$row[Codigo_Jogo]'>" . $row['Nome_Jogo'] . "</a>";

                    if (isset($_SESSION['codtipoUti'])) {
                      $sql1 = "select * from ListaDesejos where codigUti = $c and CodigoJogo ='" . $row['Codigo_Jogo'] . "'";
                      $res1 = $lig->query($sql1);
                      if ($res1->num_rows) {
                        echo " <span class='fa fa-minus-circle' onclick='return lid(this,$row[Codigo_Jogo],$c);'></span></h3>";
                      } else {

                        echo " <span class='fa fa-plus-circle' onclick='return lid(this,$row[Codigo_Jogo],$c);'></span></h3>";
                      }
                    }

                    echo "<p><a href='index.php?cmd=PRlist&cod=" . $row['Codigo_Produtor'] . "'>" . $row['Nome_Produtor'] . "</a></p>"; ?>
                  </div>
                </div>
            </div>

          <?php
              } ?>
          </div>
        </section>
      </section>


    <?php
      mysqli_free_result($result1);
    } else {
    ?>
      <section id="bc" class="full-height">
        <section id="speakers" class="wow fadeInUp">
          <div class="section-header"><br>
            <h2 style="color: #d12141">Lista de desejos</h2>
            <br>
          </div>
          <div class="container">
            <div class="speaker">
              <a style="color: #d12141">Não foi encontrado jogos na sua lista de desejos</a>
            </div>
          </div>
        </section>
      </section>
<?php
    }
  } else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($lig);
  }
} else {

  echo '<meta http-equiv="refresh" content="0;url=index.php?cmd=home">';
}
?>

<!-- script ld-->
<script type="text/javascript" src="js/fil.js"></script>