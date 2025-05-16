<?php

// Database connection details
$server = "tahira-server.mysql.database.azure.com";
$database = "tahira-database";
$username = "tahira";
$password = "@bajwa123456789";
$port = 3306;
$ssl_ca = __DIR__ . "/certs/BaltimoreCyberTrustRoot.crt.pem"; // Path to SSL cert

// Initialize connection with SSL
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $ssl_ca, NULL, NULL);

// Connect to database securely
if (!mysqli_real_connect($conn, $server, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die("❌ Secure connection failed: " . mysqli_connect_error());
}
