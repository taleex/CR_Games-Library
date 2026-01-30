<?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
require '../../files/cone.php';

// Include TCPDF library
require("tcpdf_include.php");

try {
    // Create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle('Listagem de Desejos - Games Library');
    $pdf->SetSubject('Relatório de Lista de Desejos');
    $pdf->SetKeywords('TCPDF, PDF, Games Library, Desejos');
    
    // Set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
    // Set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
    // Set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
    // Set font
    $pdf->SetFont('helvetica', 'B', 14);
    
    // Add a page
    $pdf->AddPage();
    
    // Set font for content
    $pdf->SetFont('helvetica', '', 10);
    
    // SQL query to get wishlist data
    $sql = "SELECT ListaDesejos.*, Jogos.*, Utilizadores.* 
            FROM Utilizadores, Jogos, ListaDesejos 
            WHERE codUti = codigUti AND CodigoJogo = Codigo_Jogo 
            ORDER BY Login";
    
    $result = mysqli_query($lig, $sql);
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Create HTML content for the PDF
            $html = '<h1 style="text-align:center; color:#f82249;">Listagem de Desejos do site Games Library</h1><br><br>
            <table border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse; width:100%;">
                 <tr style="background-color:#f0f0f0; font-weight:bold;">
                 <th style="width:25%;">Login do Usuário</th>
                 <th style="width:50%;">Nome do Jogo</th>
                 <th style="width:25%;">Imagem do Jogo</th>
            </tr>';
            
            while ($row = mysqli_fetch_array($result)) {
                // Get the correct image path
                $imgPath = '../../' . $row['IMGjg'];
                $html .= '<tr>
                    <td>' . $row['Login'] . '</td>
                    <td>' . $row['Nome_Jogo'] . '</td>
                    <td style="text-align:center;">';
                
                // Check if image exists before adding it to PDF
                if (file_exists($imgPath)) {
                    $html .= '<img src="' . $imgPath . '" width="40" height="40" style="max-width:100px; max-height:60px;"/>';
                } else {
                    $html .= '<span style="color:#999; font-style:italic;">Imagem não disponível</span>';
                }
                
                $html .= '</td></tr>';
            }
            $html .= '</table>';
        } else {
            $html = '<h2 style="text-align:center; color:#f82249;">Não foram encontrados resultados para a Listagem de Desejos do site Games Library</h2>';
        }
    } else {
        $html = '<h2 style="text-align:center; color:red;">ERROR: Could not execute query. ' . mysqli_error($lig) . '</h2>';
    }
    
    // Output HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
    
    // Close and output PDF document
    $pdf->Output('relatorio_desejos.pdf', 'I');
    
} catch (Exception $e) {
    die('Error generating PDF: ' . $e->getMessage());
}
