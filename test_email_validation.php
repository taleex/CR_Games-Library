<?php
// Test script to check email validation directly
$servername = "sql100.infinityfree.com";
$username = "if0_40948955";
$password = "zBHdSjgr60";
$database = "if0_40948955_gameslibrary";

$lig = new mysqli($servername, $username, $password, $database);

if ($lig->connect_error) {
    die("Problema na ligação ao servidor MYSQL: " . $lig->connect_error);
}

// Test with a sample email
$q = "test123@example.com";

// Use prepared statement to prevent SQL injection
$stmt = $lig->prepare("select * from Utilizadores where email = ?");
$stmt->bind_param("s", $q);
$stmt->execute();
$res = $stmt->get_result();
$l = $res->fetch_array();

echo "Testing email: " . $q . "<br>";
echo "Query executed successfully<br>";

if($l) {
    echo "Result: email já se encontra registado no sistema";
} else {
    echo "Result: Email disponível";
}

$lig->close();
?>