<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.html"); // Redirect to the login page if not logged in
    exit();
}

// Get the username from the session
$username = $_SESSION["username"];
?>

