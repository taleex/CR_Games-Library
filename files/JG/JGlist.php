<link href="../../css/my.css" rel="stylesheet">
<?php
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
  $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Nome_Jogo like CONCAT('%',$filtro1,'%') order by Codigo_Jogo";
else
  $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor order by Codigo_Jogo";

$res = $lig->query($sql);
$nr = $res->num_rows;
$qp = $nr / $tp + 1;

if ($filtro != '')
  $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Nome_Jogo like CONCAT('%',$filtro1,'%') order by Codigo_Jogo limit $ini, $tp";
else {
  $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor order by Codigo_Jogo limit $ini, $tp";
}
$res = $lig->query($sql);

$pagtd= 1;

if ((isset($_SESSION['codtipoUti']))) {
  $c = $_SESSION['codUti'];

  //Listar Lista de Desejos
}
else{
  $c = -404;
}

if ($result = $lig->query($sql)) {
  if ($result->num_rows > 0) { ?>

    <!--==========================
      Listar Jogos
    ============================-->

    <section id="bc" class="full-height">
      <section id="speakers" class="wow fadeInUp">
        <div class="section-header"><br>
          <h2 style="color: #d12141">Jogos</h2>
          <br>

          <center>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 mx-auto">
                <input type="text" class="form-control" id="pesq" name="pesquisa" data-c="<?php echo $c; ?>" placeholder="Pesquisar jogos...">
              </div>
              <br>

          </center><br>

          
          <?php if ($filtro != '')
            echo "<center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=JGlist>Listar todos os Jogos</a></center><br>"; ?>


          <center>
            <?php for ($i = 1; $i < $qp; $i++)
              echo "<b><a href=index.php?cmd=JGlist&pag=$i>&nbsp$i&nbsp</a></b>"; ?>
          </center>
        </div>
        <!-- fazer a paginação funcionar no ajax sff -->

        <div class="container" id="jg">
          <div class="row">
            <?php
            while ($row = $result->fetch_array()) {
            ?>

              <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="speaker">
                  <?php echo "<img src='" . 'backoffice/3P2/' . $row['IMGjg'] . "' alt='" . $row['Nome_Jogo'] . "' class='img-fluid game-image-responsive' style='width: 100%; height: 200px; object-fit: cover;'/>
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
    mysqli_free_result($result);
  } else {
    echo "Não foi encontrado resultados";
  }
} else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($lig);
}

?>

<!-- script ld-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/fil.js"></script>
