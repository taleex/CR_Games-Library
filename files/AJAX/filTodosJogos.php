<?php
require '../cone.php';

// Sanitize and validate input parameters
$p = isset($_GET["p"]) ? trim($_GET["p"]) : '';
$c = isset($_GET["c"]) ? (int)$_GET["c"] : -404;
$pag = isset($_GET["pa"]) ? (int)$_GET["pa"] : 1;
$pr = isset($_GET["pr"]) ? (int)$_GET["pr"] : null;
$Gr = isset($_GET["Gr"]) ? (int)$_GET["Gr"] : null;
$Pl = isset($_GET["Pl"]) ? (int)$_GET["Pl"] : null;

$tp = 6;
$pagina = isset($_REQUEST['pag']) ? (int)$_REQUEST['pag'] : 1;
$ini = ($pagina - 1) * $tp;

// Build the query dynamically based on parameters
$searchTerm = !empty($p) ? "%$p%" : '';
$whereConditions = [];
$params = [];
$types = '';

// Add search condition if search term exists
if (!empty($searchTerm)) {
  $whereConditions[] = "Jogos.Nome_Jogo LIKE ?";
  $params[] = $searchTerm;
  $types .= 's';
}

// Add filters based on page type
switch ($pag) {
  case 2: // Produtora filter
    if ($pr !== null && $pr > 0) {
      $whereConditions[] = "Produtores.Codigo_Produtor = ?";
      $params[] = $pr;
      $types .= 'i';
    }
    break;
  case 3: // Genero filter
    if ($Gr !== null && $Gr > 0) {
      $whereConditions[] = "Tipo_de_Jogo.CodTipoJogo = ?";
      $params[] = $Gr;
      $types .= 'i';
    }
    break;
  case 4: // Lista de Desejos filter
    if ($c !== -404) {
      $whereConditions[] = "ListaDesejos.codigUti = ?";
      $params[] = $c;
      $types .= 'i';
    }
    break;
  case 5: // Plataforma filter
    if ($Pl !== null && $Pl > 0) {
      $whereConditions[] = "Plataforma.Codigo_Plataforma = ?";
      $params[] = $Pl;
      $types .= 'i';
    }
    break;
}

// Build the base query with proper JOIN syntax
$baseQuery = "SELECT Jogos.*, Produtores.*, Tipo_de_Jogo.*";

// Add additional tables for specific page types
if ($pag == 4) {
  $baseQuery .= ", ListaDesejos.*";
} elseif ($pag == 5) {
  $baseQuery .= ", Plataforma.*, JogosPlataforma.*";
}

$baseQuery .= " FROM Jogos 
               INNER JOIN Produtores ON Produtores.Codigo_Produtor = Jogos.Codigo_Produtor 
               INNER JOIN Tipo_de_Jogo ON Tipo_de_Jogo.CodTipoJogo = Jogos.CodTipoJogo";

// Add additional JOINs for specific page types
if ($pag == 4) {
  $baseQuery .= " INNER JOIN ListaDesejos ON ListaDesejos.CodigoJogo = Jogos.Codigo_Jogo";
} elseif ($pag == 5) {
  $baseQuery .= " INNER JOIN JogosPlataforma ON JogosPlataforma.CodigoJogo = Jogos.Codigo_Jogo
                  INNER JOIN Plataforma ON Plataforma.Codigo_Plataforma = JogosPlataforma.Codigo_Plataforma";
}

// Build WHERE clause
$whereClause = '';
if (!empty($whereConditions)) {
  $whereClause = " WHERE " . implode(' AND ', $whereConditions);
}

// Complete query with ORDER BY and LIMIT
$sql = $baseQuery . $whereClause . " ORDER BY Jogos.Codigo_Jogo LIMIT ?, ?";
$params[] = $ini;
$params[] = $tp;
$types .= 'ii';

// Execute the prepared statement
$stmt = $lig->prepare($sql);
if (!$stmt) {
  die("Prepare failed: " . $lig->error);
}

$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

// Get total count for pagination
$countQuery = "SELECT COUNT(*) as total FROM Jogos 
               INNER JOIN Produtores ON Produtores.Codigo_Produtor = Jogos.Codigo_Produtor 
               INNER JOIN Tipo_de_Jogo ON Tipo_de_Jogo.CodTipoJogo = Jogos.CodTipoJogo";

if ($pag == 4) {
  $countQuery .= " INNER JOIN ListaDesejos ON ListaDesejos.CodigoJogo = Jogos.Codigo_Jogo";
} elseif ($pag == 5) {
  $countQuery .= " INNER JOIN JogosPlataforma ON JogosPlataforma.CodigoJogo = Jogos.Codigo_Jogo
                   INNER JOIN Plataforma ON Plataforma.Codigo_Plataforma = JogosPlataforma.Codigo_Plataforma";
}

$countQuery .= $whereClause;
$countStmt = $lig->prepare($countQuery);
if (!$countStmt) {
  die("Count prepare failed: " . $lig->error);
}

// Remove the LIMIT parameters for count query
$countParams = $params;
array_pop($countParams);
array_pop($countParams);
$countTypes = substr($types, 0, -2);

if (!empty($countParams)) {
  $countStmt->bind_param($countTypes, ...$countParams);
}
$countStmt->execute();
$countResult = $countStmt->get_result();
$totalRows = $countResult->fetch_assoc()['total'];
$qp = ceil($totalRows / $tp);
?>

<!--==========================
      Listar Jogos
    ============================-->

<?php
// Generate back link based on page type and search
switch ($pag) {
  case 1:
    if (!empty($p))
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href='index.php?cmd=JGlist'>Listar todos os Jogos</a><br><br>";
    break;
  case 2:
    if (!empty($p) && $pr !== null)
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href='index.php?cmd=PRlist&cod=$pr'>Listar todos os Jogos da produtora</a><br><br>";
    break;
  case 3:
    if (!empty($p) && $Gr !== null)
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href='index.php?cmd=TJlist&cod=$Gr'>Listar todos os Jogos deste genero</a><br><br>";
    break;
  case 4:
    if (!empty($p) && $c !== -404)
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href='index.php?cmd=LDlist&cod=$c'>Listar todos os Jogos da sua lista de desejos</a><br><br>";
    break;
  case 5:
    if (!empty($p) && $Pl !== null)
      echo "<div class='section-header'><center><a style='border-style: solid; padding:4px; border-width: thin;' href='index.php?cmd=PLlist&cod=$Pl'>Listar todos os Jogos desta plataforma</a><br><br>";
    break;
}

echo '<div class="container">
          <div class="row">';

if ($result->num_rows > 0) {
  while ($row = $result->fetch_array()) {
    echo '<div class="col-lg-4 col-md-4 col-sm-8"><div class="speaker">';
    echo "<img src='" . './backoffice/3P2/' . $row['IMGjg'] . "' height='200' width='350' alt='Speaker 1'/>
              <div class='details' style='background-color: rgba(255, 0, 0, 0.5);'>";
    echo "<h3><a href='index.php?cmd=JGinf&cod=$row[Codigo_Jogo]'>" . htmlspecialchars($row['Nome_Jogo']) . "</a>";

    if ($c != "-404") {
      $sql1 = "SELECT * FROM ListaDesejos WHERE codigUti = ? AND CodigoJogo = ?";
      $stmt1 = $lig->prepare($sql1);
      $stmt1->bind_param("ii", $c, $row['Codigo_Jogo']);
      $stmt1->execute();
      $res1 = $stmt1->get_result();
      
      if ($res1->num_rows) {
        echo " <span class='fa fa-minus-circle' onclick='return lid(this,$row[Codigo_Jogo],$c);'></span></h3>";
      } else {
        echo " <span class='fa fa-plus-circle' onclick='return lid(this,$row[Codigo_Jogo],$c);'></span></h3>";
      }
    }
    echo "<p><a href='index.php?cmd=PRlist&cod=" . $row['Codigo_Produtor'] . "'>" . htmlspecialchars($row['Nome_Produtor']) . "</a></p>
              </div></div></div>";
  }
} else {
  echo "<div class='col-12'><p>Nenhum jogo encontrado.</p></div>";
}
echo '</div></div>';

echo '<center>';
for ($i = 1; $i <= $qp; $i++) {
  echo "<b><a href='javascript:void(0);' onclick='filTodosJogos(document.getElementById(\"pesq\"), $c, $pag, $i);'>&nbsp;$i&nbsp;</a></b>";
}
echo '</center>';

$stmt->close();
$countStmt->close();
?>
