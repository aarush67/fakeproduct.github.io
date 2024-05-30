<?php
$data = json_decode(file_get_contents('php://input'), true);
$index = $data['index'];

$threadsFile = 'data/threads.txt';

if (file_exists($threadsFile)) {
    $threads = json_decode(file_get_contents($threadsFile), true);

    if (isset($threads[$index])) {
        array_splice($threads, $index, 1);
        file_put_contents($threadsFile, json_encode($threads));
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Thread not found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Threads file not found']);
}
?>
