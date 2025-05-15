<?php
// Database connection details
$servername = "tahira-server.mysql.database.azure.com";
$dbusername = "tahira";
$password = "@bajwa123456789";
$dBName = "tahira-database";

// Create connection
$conn = mysqli_connect($servername, $dbusername, $password, $dBName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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
