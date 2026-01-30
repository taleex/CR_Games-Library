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
          <div class="search-container">
            <div class="search-wrapper">
              <input type="text" class="form-control search-input" id="pesq" name="pesquisa" onInput="return filJogosGr(this,<?php echo $c; ?>,<?php echo $co; ?>,<?php echo $pagtd; ?>);" placeholder="Pesquisar jogos...">
            </div>
          </div><br>

          <?php if ($filtro != '')
            echo "<div class='filter-info'><a class='clear-filter' href=index.php?cmd=TJlist>Listar todos os Jogos</a></div><br>"; ?>

          <div class="pagination-container">
            <?php for ($i = 1; $i < $qp; $i++)
              echo "<a class='page-link' href=index.php?cmd=TJlist&cod=$co&pag=$i>$i</a>"; ?>
          </div>
        </div>

        <div class="container" id="GR">
          <div class="games-grid">
            <?php
            while ($row = $games_result->fetch_array()) {
            ?>
              <div class="game-card">
                <div class="game-image-container">
                  <img src="<?php echo 'backoffice/3P2/' . $row['IMGjg']; ?>" alt="<?php echo $row['Nome_Jogo']; ?>" class="game-image">
                  <div class="game-overlay">
                    <a href="index.php?cmd=JGinf&cod=<?php echo $row['Codigo_Jogo']; ?>" class="game-link">Ver Detalhes</a>
                  </div>
                </div>
                <div class="game-details">
                  <h3 class="game-title">
                    <a href="index.php?cmd=JGinf&cod=<?php echo $row['Codigo_Jogo']; ?>"><?php echo $row['Nome_Jogo']; ?></a>
                    <?php if (isset($_SESSION['codtipoUti'])) {
                      $sql1 = "select * from ListaDesejos where codigUti = $c and CodigoJogo ='" . $row['Codigo_Jogo'] . "'";
                      $res1 = $lig->query($sql1);
                      if ($res1->num_rows) {
                        echo "<span class='wishlist-icon fa fa-minus-circle' onclick='return lid(this,$row[Codigo_Jogo],$c);' title='Remover da lista de desejos'></span>";
                      } else {
                        echo "<span class='wishlist-icon fa fa-plus-circle' onclick='return lid(this,$row[Codigo_Jogo],$c);' title='Adicionar à lista de desejos'></span>";
                      }
                    } ?>
                  </h3>
                  <p class="game-producer">
                    <a href="index.php?cmd=PRlist&cod=<?php echo $row['Codigo_Produtor']; ?>"><?php echo $row['Nome_Produtor']; ?></a>
                  </p>
                </div>
              </div>
            <?php } ?>
          </div>
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