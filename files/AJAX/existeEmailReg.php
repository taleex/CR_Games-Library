<?php
// Use the same database connection as the main site
$servername = "sql100.infinityfree.com";
$username = "if0_40948955";
$password = "zBHdSjgr60";
$database = "if0_40948955_gameslibrary";

$lig = new mysqli($servername, $username, $password, $database);

if ($lig->connect_error) {
    die("Problema na ligação ao servidor MYSQL: " . $lig->connect_error);
}

$q = $_GET["m"]; // recebe uma parâmetro por GET

// For registration, simply check if email exists in database
$s = "select * from Utilizadores where email = '$q'";
$res = $lig->query($s); 
$l = $res->fetch_array();

if($l) {
    echo "email já se encontra registado no sistema";
} else {
    echo "Email disponível";
}

$lig->close();
?>
