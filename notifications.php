<?php
$file = 'data/notifications.txt';

if (file_exists($file)) {
    $notifications = json_decode(file_get_contents($file), true);
} else {
    $notifications = [];
}

// Assign IDs to notifications
foreach ($notifications as $key => &$notification) {
    $notification['id'] = $key + 1;
}

echo json_encode(['notifications' => $notifications]);
?>
