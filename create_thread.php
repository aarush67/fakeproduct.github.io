<?php
$data = json_decode(file_get_contents('php://input'), true);

$title = $data['title'];
$content = $data['content'];
$createdAt = date('Y-m-d H:i:s');

$thread = [
    'title' => $title,
    'content' => $content,
    'created_at' => $createdAt
];

$threadsFile = 'data/threads.txt';
$threads = [];

if (file_exists($threadsFile)) {
    $threads = json_decode(file_get_contents($threadsFile), true);
}

$threads[] = $thread;

file_put_contents($threadsFile, json_encode($threads));

echo json_encode(['success' => true]);
?>
