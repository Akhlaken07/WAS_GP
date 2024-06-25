<?php
session_start();
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    // CSRF token does not match, reject the form submission
    die('Invalid CSRF token');
}
require 'db_connect.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email with provided regex
    $email = $_POST["email"];
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        echo "<script type='text/javascript'>alert('Invalid email format'); window.location.href = 'loginPage.php';</script>";
        exit;
    }

    $password = $_POST["password"];
    if (!preg_match("/^[a-zA-Z0-9!@#$%^&*]{6,}$/", $password)) {
        echo "<script type='text/javascript'>alert('Password must contain at least one letter, at least one number, and be at least 6 characters long'); window.location.href = 'loginPage.php';</script>";
        exit;
    }

    $sql = "SELECT id, password, role FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Set the session variable
        $_SESSION['userid'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['useremail'] = $email;

        // Redirect based on role
        if ($user['role'] == 'admin') {
            header("Location: qr_otp.php");
        } else {
            header("Location: userHomepage.php");
        }
        exit;
    } else {
        echo "<script type='text/javascript'>alert('Invalid email or password'); window.location.href = 'loginPage.php';</script>";
    }
}

$conn->close();
?>