<?php
// File path to user data file
$filePath = "data/user_data.txt";

// Initialize an array to store user data
$userData = array();

// Open the file for reading
$file = fopen($filePath, "r");

// Check if the file opened successfully
if ($file) {
    // Read each line of the file until the end
    while (!feof($file)) {
        // Read the current line
        $line = fgets($file);
        
        // Extract user data from the line
        if (strpos($line, "Name:") !== false) {
            $userData['username'] = trim(substr($line, strlen("Name:")));
        } elseif (strpos($line, "Email:") !== false) {
            $userData['email'] = trim(substr($line, strlen("Email:")));
        } elseif (strpos($line, "Password:") !== false) {
            $userData['password'] = trim(substr($line, strlen("Password:")));
        }
    }

    // Close the file
    fclose($file);

    // Output the user data as JSON
    echo json_encode($userData);
} else {
    // Print an error message if the file could not be opened
    echo json_encode(array('error' => 'Unable to open user data file.'));
}
?>
