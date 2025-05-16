<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
require "dbh.inc.php";

// Check if form is submitted
if (isset($_POST['signup-submit'])) {

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];

    // Validate required fields
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill in all fields.";
        exit();
    }

    // Hash the password
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error: " . mysqli_error($conn);
        exit();
    }

    // Bind and execute
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    if (mysqli_stmt_execute($stmt)) {
        echo "Signup successful!";
    } else {
        echo "Failed to signup: " . mysqli_stmt_error($stmt);
    }

    // Close connections
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
    echo "Invalid access.";
}
?>
