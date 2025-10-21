<?php
$a = $_SESSION['login'];
$pr = $_REQUEST['pr'];
$em = $_REQUEST['em'];

$UC = $_SESSION['codUti'];

$extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
$name = $a;

$NJfile = $name . "." . $extension;
$path = "./backoffice/3P2/files/IMG/Comprovativo/";
$img = $path . $NJfile;
$orig = $_FILES['img']['tmp_name'];

if (copy($orig, $img)) {
    $sql = "update Utilizadores set comprovativo='$img' where codUti='$UC'";
    $lig->query($sql) or die("ERRO: alteração da tabela Utilizadores");


    $sql1 = "select * from Utilizadores where codtipoUti = '13'";
    $res1 = $lig->query($sql1);
    $lin1 = $res1->fetch_array();

    $to = $lin1['email'];
    $subject = $a . " - Quer adicionar a sua produtora";

    $message = "<html>
    <head>
<title>HTML email</title>
</head>
<body><center class='col-sm'>
<div style='background-color:rgba(6, 12, 34, 0.98);'><br>
<img src='http://papserver.aelc.pt/~Jorge34798/PSI/PAP%20PROJETO/Games%20Library/img/logo.png' height='70' width='300'><br><br>
</div>
<div style='background-color:#dc3545;color:White;'><br>
<h2>Nome da produtora: " . $pr . "</h2><br>
<h2>Email do utilizador: " . $em . "</h2><br>
</div>
</center>
</body>
</html>
";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <' . $em . '>' . "\r\n";

    mail($to, $subject, $message, $headers);
    echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
} else {
    echo "<center><br><br><br><a class=\"intro-lead-in\">Imagem não carregada!!!</a><br>";
    echo "<a class=\"btn btn-primary btn-xl text-uppercase js-scroll-trigger\" href=\"index.php?cmd=conta\">Voltar</a></center>";
    echo "Alguma informação da transferência<br>";
    print_r($_FILES);
}
