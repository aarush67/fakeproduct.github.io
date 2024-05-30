<?php
session_start();

if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo 'Unauthorized';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userData = "Name: (\"$username\")\nEmail: (\"$email\")\nPassword: (\"$password\")\n";
    file_put_contents('user_data.txt', $userData);

    header('Location: profile.html');
    exit;
}
?>
