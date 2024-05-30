<?php
$file = 'data/notifications.txt';

// Check if the file exists
if (!file_exists($file)) {
    echo json_encode(['message' => 'Notifications file not found']);
    exit;
}

// Attempt to read file contents
$notificationsJson = file_get_contents($file);

// Check if file read was successful
if ($notificationsJson === false) {
    echo json_encode(['message' => 'Error reading notifications file']);
    exit;
}

// Attempt to decode JSON
$notifications = json_decode($notificationsJson, true);

// Check if JSON decoding was successful
if ($notifications === null) {
    echo json_encode(['message' => 'Error decoding JSON']);
    exit;
}

// Check if the ID parameter is set and valid
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $notificationId = intval($_POST['id']);

    // Find the index of the notification with the specified ID
    $index = array_search($notificationId, array_column($notifications, 'id'));

    // If the notification exists, remove it from the array
    if ($index !== false) {
        unset($notifications[$index]);
        // Write updated notifications back to the file
        if (file_put_contents($file, json_encode(array_values($notifications))) !== false) {
            // Redirect to notification_deleted_successfully.html
            header('Location: notification_deleted_successfully.html');
            exit;
        } else {
            echo json_encode(['message' => 'Error writing to notifications file']);
            exit;
        }
    } else {
        echo json_encode(['message' => 'Notification not found']);
        exit;
    }
} else {
    echo json_encode(['message' => 'Invalid or missing ID parameter']);
    exit;
}
?>
