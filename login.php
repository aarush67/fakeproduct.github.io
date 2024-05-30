<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$file = fopen("data/user_data.txt", "r");
$valid = false;
$user_data = [
    'Name' => '',
    'Email' => '',
    'Password' => ''
];

while (($line = fgets($file)) !== false) {
    $parts = explode(':', $line, 2); // Split only on the first ':'
    if (count($parts) == 2) {
        $key = trim($parts[0]);
        $value = trim($parts[1]);

        if (array_key_exists($key, $user_data)) {
            $user_data[$key] = $value;
        }
    }
}

// Close the file
fclose($file);

// Check if username and password match
if (trim($user_data['Name']) === $username && trim($user_data['Password']) === $password) {
    $valid = true;
    $_SESSION['username'] = trim($user_data['Name']);
    $_SESSION['email'] = trim($user_data['Email']);
}

if ($valid) {
    header("Location: dashboard.html");
    exit();
} else {
    header("Location: login_error.html");
    exit();

}
?>
