<?php
include "../../files/cone.php";
$co = $_REQUEST['cod'];
$sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Tipo_de_Jogo.CodTipoJogo = $co";
$res = $lig->query($sql);
if (!$res) {
    die("Error in first query: " . $lig->error);
}
$lin = $res->fetch_array();
if (!$lin) {
    echo "<div style='color: red; padding: 20px; border: 2px solid red;'>DEBUG: No genre found with cod: $co</div>";
    exit;
}
echo "<!-- DEBUG: Genre found: " . $lin['Genero'] . " -->";
?>

<link href="../../css/my.css" rel="stylesheet">

<?php
$tp = 6;
if (isset($_REQUEST['pag']))
  $np = $_REQUEST['pag'];
else
  $np = 1;
$ini = ($np - 1) * $tp;

if (isset($_REQUEST['pesquisa']) && $_REQUEST['pesquisa'] != '') {
  $filtro1 = $_REQUEST['pesquisa'];
  $filtro = $_REQUEST['pesquisa'];
  $filtro = '%' . $filtro . '%';
} else $filtro = '';

if ($filtro != '')
  $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Tipo_de_Jogo.CodTipoJogo = $co and Nome_Jogo like CONCAT('%',$filtro1,'%')";
else
  $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Tipo_de_Jogo.CodTipoJogo = $co order by Codigo_Jogo";

$res = $lig->query($sql);
$nr = $res->num_rows;
$qp = $nr / $tp + 1;

$pagtd = 3;

if ($filtro != '')
  $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Tipo_de_Jogo.CodTipoJogo = $co and Nome_Jogo like CONCAT('%',$filtro1,'%') limit $ini, $tp";
else {
  $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Tipo_de_Jogo.CodTipoJogo = $co order by Codigo_Jogo limit $ini, $tp";
}
$res = $lig->query($sql);
if (!$res) {
    die("Error in pagination query: " . $lig->error);
}
if ((isset($_SESSION['codtipoUti']))) {
  $c = $_SESSION['codUti'];

  //Listar Lista de Desejos
} else {
  $c = -404;
}

if ($games_result = $lig->query($sql)) {
  if (!$games_result) {
      die("Error in main query: " . $lig->error);
  }
  echo "<!-- DEBUG: SQL Query: $sql -->";
  echo "<!-- DEBUG: Games query executed, found " . $games_result->num_rows . " games -->";
  if ($games_result->num_rows > 0) { ?>

<section id="bc" class="full-height">
      <section id="speakers" class="wow fadeInUp">
        <div class="section-header"><br>
          <h2 style="color: #d12141"><?php echo $lin['Genero']; ?></h2>
          <br>

          <center>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 mx-auto">
                <input type="text" class="form-control" id="pesq" name="pesquisa" onInput="return filJogosGr(this,<?php echo $c; ?>,<?php echo $co; ?>,<?php echo $pagtd; ?>);" placeholder="Pesquisar jogos...">
              </div>
              <br>

          </center><br>

          <?php if ($filtro != '')
            echo "<center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=TJlist>Listar todos os Jogos</a></center><br>"; ?>

          <center>
            <?php for ($i = 1; $i < $qp; $i++)
              echo "<b><a href=index.php?cmd=TJlist&cod=$co&pag=$i>&nbsp$i&nbsp</a></b>"; ?>
          </center>
        </div>

        <div class="container" id="GR">
          <div class="row">
            <?php
            while ($row = $games_result->fetch_array()) {
            ?>
              <div class="col-12 col-sm-6 col-md-4 col-lg-4">
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
    mysqli_free_result($games_result);
  } else {
    $sql1 = "select Tipo_de_Jogo.* from Tipo_de_Jogo where CodTipoJogo = $co";
    $res1 = $lig->query($sql1);
    $lin1 = $res1->fetch_array();
  ?>
    <section id="bc" class="full-height">
      <section id="speakers" class="wow fadeInUp">
        <div class="section-header"><br>
          <h2 style="color: #d12141"><?php echo $lin1['Genero']; ?></h2>
          <br>
        </div>
        <div class="container">
          <div class="speaker">
            <a style="color: #d12141">Não foi encontrado jogos no genero <?php echo $lin1['Genero']; ?></a>
          </div>
        </div>
      </section>
    </section>

<?php }
} else {
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($lig);
}
?>

<!-- script ld-->
<script type="text/javascript" src="js/fil.js"></script>