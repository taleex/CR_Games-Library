<?php
unset($_SESSION["nome"]);
session_destroy();
if(!isset($_SESSION["nome"]))
echo "<meta http-equiv=refresh content=0;URL=index.php?cmd=home>";
?>
