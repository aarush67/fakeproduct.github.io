<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($email) && !empty($password)) {
        // Sanitize inputs
        $sanitized_name = filter_var($name, FILTER_SANITIZE_STRING);
        $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Store the data in a file
        $data = "Name: $sanitized_name\nEmail: $sanitized_email\nPassword: $hashed_password\n";
        $file_path = "data/user_data.txt";
        file_put_contents($file_path, $data, FILE_APPEND | LOCK_EX);

        // Optionally, you can redirect the user to a thank you page
        header("Location: thank_you.html");
        exit;
    } else {
        // Redirect back to sign-up page if required fields are not provided
        header("Location: sign_up.html");
        exit;
    }
} else {
    // Redirect back to sign-up page if accessed directly
    header("Location: sign_up.html");
    exit;
}
?>
