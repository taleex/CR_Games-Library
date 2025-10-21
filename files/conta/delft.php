<?php

$UC = $_SESSION['codUti'];

    $sql = "select * from Utilizadores where codUti='$UC'";
    $res = $lig->query($sql);
    $lin = $res->fetch_array();
   
    unlink("./backoffice/3P2/files/IMG/".$lin['Login'].".png");
    unlink("./backoffice/3P2/files/IMG/".$lin['Login'].".jpg");


    $img = "./backoffice/3P2/files/IMG/defeito.png";
    $sql1="update Utilizadores set img='$img' where codUti='$UC'";
    $lig->query($sql1) or die("ERRO: alteração da tabela Utilizadores");
    $_SESSION['foto'] = $img;
    echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=conta>";  
?>