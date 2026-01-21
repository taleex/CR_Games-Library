<?php
require '../cone.php';

$p = $_GET["p"];
//cod uti
$c = $_GET["c"];
//pagina referente
$pag = $_GET["pa"];
//produtora
$pr = $_GET["pr"];
//Genero
$Gr = $_GET["Gr"];
//Plataforma
$Pl = $_GET["Pl"];

$tp = 6;
if (isset($_REQUEST['pag']))
  $np = $_REQUEST['pag'];
else
  $np = 1;
$ini = ($np - 1) * $tp;


switch ($pag) {
  case 1:
    if ($p != '') {
      $filtro1 = $p;
      $filtro = $p;
      $filtro = '%' . $filtro . '%';
      $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Nome_Jogo like CONCAT('%',$filtro1,'%') order by Codigo_Jogo limit $ini, $tp";
    } else if ($p == '') {
      $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor order by Codigo_Jogo limit $ini, $tp";
    }
    break;

  case 2:
    if ($p != '') {
      $filtro1 = $p;
      $filtro = $p;
      $filtro = '%' . $filtro . '%';
      $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Produtores.Codigo_Produtor = $pr and Nome_Jogo like CONCAT('%',$filtro1,'%') order by Codigo_Jogo limit $ini, $tp";
    } else if ($p == '') {
      $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Produtores.Codigo_Produtor = $pr order by Codigo_Jogo limit $ini, $tp";
    }
    break;

  case 3:
    if ($p != '') {
      $filtro1 = $p;
      $filtro = $p;
      $filtro = '%' . $filtro . '%';
      $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Tipo_de_Jogo.CodTipoJogo = $Gr and Nome_Jogo like CONCAT('%',$filtro1,'%') order by Codigo_Jogo limit $ini, $tp";
    } else if ($p == '') {
      $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.* from Tipo_de_Jogo,Produtores,Jogos where Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and Tipo_de_Jogo.CodTipoJogo = $Gr order by Codigo_Jogo limit $ini, $tp";
    }
    break;

  case 4:
    if ($p != '') {
      $filtro1 = $p;
      $filtro = $p;
      $filtro = '%' . $filtro . '%';
      $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.*,ListaDesejos.* from Tipo_de_Jogo,Produtores,Jogos,ListaDesejos where CodigoJogo = Codigo_Jogo and Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and codigUti = $c and Nome_Jogo like CONCAT('%',$filtro1,'%') order by Codigo_Jogo limit $ini, $tp";
    } else if ($p == '') {
      $sql = "select Jogos.*,Produtores.*,Tipo_de_Jogo.*,ListaDesejos.* from Tipo_de_Jogo,Produtores,Jogos,ListaDesejos where CodigoJogo = Codigo_Jogo and Tipo_de_Jogo.CodTipoJogo=Jogos.CodTipoJogo and Produtores.Codigo_Produtor=Jogos.Codigo_Produtor and codigUti = $c order by Codigo_Jogo limit $ini, $tp";
    }
    break;

  case 5:
    if ($p != '') {
      $filtro1 = $p;
      $filtro = $p;
      $filtro = '%' . $filtro . '%';
      $sql = "select Jogos.*,Produtores.*,Plataforma.*,JogosPlataforma.* from Plataforma,JogosPlataforma,Jogos,Produtores where CodigoPlataforma=Codigo_Plataforma and CodigoJogo	= Codigo_Jogo and Produtores.Codigo_Produtor = Jogos.Codigo_Produtor and Codigo_Plataforma = $Pl and Nome_Jogo like CONCAT('%',$filtro1,'%') order by Codigo_Jogo limit $ini, $tp";
    } else if ($p == '') {
      $sql = "select Jogos.*,Produtores.*,Plataforma.*,JogosPlataforma.* from Plataforma,JogosPlataforma,Jogos,Produtores where CodigoPlataforma=Codigo_Plataforma and CodigoJogo	= Codigo_Jogo and Produtores.Codigo_Produtor = Jogos.Codigo_Produtor and Codigo_Plataforma = $Pl order by Codigo_Jogo limit $ini, $tp";
    }
    break;
}



?>
<!--==========================
      Listar Jogos
    ============================-->


<?php
$result = $lig->query($sql);
$nr = $result->num_rows;
$qp = $nr / $tp + 1;

switch ($pag) {

  case 1:
    if ($filtro != '')
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=JGlist>Listar todos os Jogos</a><br><br>";
    break;
  case 2:
    if ($filtro != '')
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=PRlist&cod=$pr>Listar todos os Jogos da produtora</a><br><br>";
    break;
  case 3:
    if ($filtro != '')
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=TJlist&cod=$Gr>Listar todos os Jogos deste genero</a><br><br>";
    break;
  case 4:
    if ($filtro != '')
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=LDlist&cod=$c>Listar todos os Jogos da sua lista de desejos</a><br><br>";
    break;
  case 5:
    if ($filtro != '')
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href=index.php?cmd=PLlist&cod=$Pl>Listar todos os Jogos desta plataforma</a><br><br>";
    break;
}


echo '<div class="container">
          <div class="row">';
while ($row = $result->fetch_array()) {

  echo '<div class="col-lg-4 col-md-4 col-sm-8"><div class="speaker">';
  echo "<img src=" . './backoffice/3P2/' . $row['IMGjg'] . " height='200' width='350' alt='Speaker 1'/>
              <div class='details' style='background-color: rgba(255, 0, 0, 0.5);'>";
  echo "<h3><a href='index.php?cmd=JGinf&cod=$row[Codigo_Jogo]'>" . $row['Nome_Jogo'] . "</a>";

  if ($c != "-404") {
    $sql1 = "select * from ListaDesejos where codigUti = $c and CodigoJogo ='" . $row['Codigo_Jogo'] . "'";
    $res1 = $lig->query($sql1);
    if ($res1->num_rows) {
      echo " <span class='fa fa-minus-circle' onclick='return lid(this,$row[Codigo_Jogo],$c);'></span></h3>";
    } else {
      echo " <span class='fa fa-plus-circle' onclick='return lid(this,$row[Codigo_Jogo],$c);'></span></h3>";
    }
  }
  echo "<p><a href='index.php?cmd=PRlist&cod=" . $row['Codigo_Produtor'] . "'>" . $row['Nome_Produtor'] . "</a></p>
              </div></div></div>";
}
?>
<script type="text/javascript" src="js/fil.js"></script>
