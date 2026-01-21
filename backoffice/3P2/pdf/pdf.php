<?php
require '../files/cone.php';

require("tcpdf_include.php");
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->AddPage();

$sql = "select Utilizadores.*,Tipo_de_utilizador.*,Produtores.* from Utilizadores,Tipo_de_utilizador,Produtores where Utilizadores.codtipoUti=Tipo_de_utilizador.codtipoUti and Codigo_Produtor=empresa";
$res = $lig->query($sql);
if ($res = mysqli_query($lig, $sql)) {
    if (mysqli_num_rows($res) > 0) {

        $html = "<h1>Listagem de Utilizadores do site Games Library</h1><br><br>
        <table>
             <tr>
             <th>cod</th>
             <th>Tipo</th>
             <th>Login</th>
             <th>Nome</th>
            <th>data nasc</th>
            <th>email</th>
            <th>estados</th>
            <th>Empresa</th>
        </tr>";
    while($row = mysqli_fetch_array($res)){
          $html.="<tr>
            <td> " . $row['codUti'] . "</td>
			<td>" . $row['dsg'] . "</td>
            <td>" . $row['Login'] . "</td>
            <td>" . $row['Nome_Utilizador'] . "</td>
            <td>" . $row['nasc'] . "</td>
            <td>" . $row['email'] . "</td>";
			if($row['ContaAtiva']==1)
            $html.="<td> Ativo </td>";
			else if($row['ContaAtiva']==0)
			$html.="<td> inativo </td>";
            $html.="<td>" . $row['Nome_Produtor'] . "</td>
            </tr>";
			}
            $html.="</table>";
	} else {
		$html="Não foi encontrado resultados para a Listagem de Utilizadores do site Games Library";
	}
} else {
	$html="ERROR: Could not able to execute $sql. " . mysqli_error($lig);
}


/*Conteúdo que irá aparecer no PDF*/
$pdf->writeHTMLCell(0,0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->Output('example_001.pdf', 'I');
