<?php

$servername = "tahira-server.mysql.database.azure.com";
$dbusername = "tahira";
$password = "@bajwa123456789";
$dBName = "tahira-database";

$conn = mysqli_connect($servername, $dbusername, $password, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection established successfully.";
}
