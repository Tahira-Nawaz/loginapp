<?php

// Database connection details
$server = "tahira-server.mysql.database.azure.com";
$database = "tahira-database";
$username = "tahira";
$password = "@bajwa123456789";
$port = 3306;
$ssl_ca = __DIR__ . "/certs/BaltimoreCyberTrustRoot.crt.pem"; // Path to SSL cert

// Initialize connection with SSL
$con = mysqli_init();
mysqli_ssl_set($con, NULL, NULL, $ssl_ca, NULL, NULL);

// Connect to database securely
if (!mysqli_real_connect($con, $server, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("❌ Secure connection failed: " . mysqli_connect_error());
    echo " Secure MySQL Connection not Successful!<br>";
} else {
    echo "✅ Secure MySQL Connection Successful!<br>";
}
