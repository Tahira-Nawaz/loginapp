<?php
// Database connection details
server = "tahira-server.mysql.database.azure.com";
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


if (isset($_POST['signup-submit'])) {

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];

    // Simple check for empty fields
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill in all fields.";
        exit();
    }

    // Hash password
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    // Insert into DB
    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error.";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    if (mysqli_stmt_execute($stmt)) {
        echo "Signup successful!";
    } else {
        echo "Failed to signup.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
    echo "Invalid access.";
}
