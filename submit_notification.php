<?php
$file = 'data/notifications.txt';

if (!empty($_POST['message'])) {
    $notification = [
        'id' => uniqid(), // Generate a unique ID for the notification
        'time' => date('Y-m-d H:i:s'),
        'message' => $_POST['message']
    ];

    $notifications = [];
    if (file_exists($file)) {
        $notifications = json_decode(file_get_contents($file), true);
    }

    $notifications[] = $notification;
    file_put_contents($file, json_encode($notifications)); // Write notifications back to file

    http_response_code(200); // Success
} else {
    http_response_code(400); // Bad Request
}
?>
