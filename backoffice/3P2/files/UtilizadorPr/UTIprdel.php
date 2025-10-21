<?php
$c = $_REQUEST['cod'];

$sql = "select * from Utilizadores where codUti = $c";
$res = $lig->query($sql);
$lin = $res->fetch_array();

$img = $lin['comprovativo'];
    unlink("../../" . $img);

$sql = "update Utilizadores set comprovativo = null where codUti = $c";
$lig->query($sql) or die("ERRO:Inserção na tabela Utilizador");
echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=UTIPR>";
