<?php

$servername = "localhost";
$username = "Jorge34798";
$password = "Eslc2019";
$database = "Jorge34798";
$lig = new mysqli($servername, $username, $password, $database)
    or die("Problema na ligação ao servidor MYSQL");

require("tcpdf_include.php");
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
$pdf->AddPage();

$sql = "select ListaDesejos.*,Jogos.*,Utilizadores.* from Utilizadores,Jogos,ListaDesejos where codUti=codigUti and CodigoJogo=Codigo_Jogo order by Login";
$res = $lig->query($sql);
if ($res = mysqli_query($lig, $sql)) {
    if (mysqli_num_rows($res) > 0) {

        $html = "<h1>Listagem de desejos do site Games Library</h1><br><br>
        <table>
             <tr>
             <th>Login</th>
             <th>Nome Jogo</th>
             <th>Imagem do Jogo</th>
        </tr>";
        while ($row = mysqli_fetch_array($res)) {
            $html .= '<tr>
            <td> ' . $row['Login'] . '</td>
            <td>' . $row['Nome_Jogo'] . '</td>
            <td><img src="../.' . $row['IMGjg'] . '" width="30" height="30"/></td><br>
            </tr>';
        }
        $html .= "</table>";
        //echo $html;
    } else {
        $html = "Não foi encontrado resultados para a Listagem de desejos do site Games Library";
    }
} else {
    $html = "ERROR: Could not able to execute $sql. " . mysqli_error($lig);
}





// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


/*Conteúdo que irá aparecer no PDF*/
$pdf->writeHTMLCell(0,0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Output('example_001.pdf', 'I');
