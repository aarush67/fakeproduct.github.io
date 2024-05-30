<?php
$threadsFile = 'data/threads.txt';

// Check if the threads file exists
if (file_exists($threadsFile)) {
    // Read the contents of the threads file
    $threadsData = file_get_contents($threadsFile);

    // Decode the JSON data into an associative array
    $threads = json_decode($threadsData, true);

    // Check if decoding was successful
    if ($threads !== null) {
        // Output the threads data as JSON
        echo json_encode(['success' => true, 'threads' => $threads]);
    } else {
        // Handle decoding error
        echo json_encode(['success' => false, 'error' => 'Error decoding threads data.']);
    }
} else {
    // Handle file not found error
    echo json_encode(['success' => false, 'error' => 'Threads file not found.']);
}
?>
