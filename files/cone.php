<?php

		$servername = "sql100.infinityfree.com";
		$username = "if0_40948955";
		$password = "zBHdSjgr60";
		$database = "if0_40948955_gameslibrary";
$lig= new mysqli ( $servername, $username, $password, $database);
if ($lig->connect_error) die ("Problema na ligação ao servidor MYSQL: " . $lig->connect_error);
