<?php
// generate.php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success'=>false, 'message'=>'Method not allowed']);
    exit;
}

header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents('php://input'), true);
$target = $data['target'] ?? null;
$lifetime = isset($data['lifetime']) ? (int)$data['lifetime'] : 600; // 10 minutes default

if (!$target) {
    http_response_code(400);
    echo json_encode(['success'=>false, 'message'=>'Missing target']);
    exit;
}

// Normalize/validate target: allow either relative paths or full https URLs.
// You can tighten this logic depending on your requirements.
if (!preg_match('#^https?://#i', $target) && !str_starts_with($target, '/')) {
    // avoid arbitrary protocols
    http_response_code(400);
    echo json_encode(['success'=>false, 'message'=>'Target must be an absolute https? URL or a path starting with /']);
    exit;
}

// Create a secure random token
$bytes = random_bytes(16); // 128-bit
$token = bin2hex($bytes);  // 32 hex chars

$now = new DateTime('now', new DateTimeZone('UTC'));
$created_at = $now->format('Y-m-d H:i:s');
$expires_at = $now->add(new DateInterval('PT' . max(1, $lifetime) . 'S'))->format('Y-m-d H:i:s');

$sql = "INSERT INTO short_urls (token, target, created_at, expires_at) VALUES (:token, :target, :created_at, :expires_at)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':token' => $token,
    ':target' => $target,
    ':created_at' => $created_at,
    ':expires_at' => $expires_at
]);

$shortUrl = sprintf("https://boostrika.com/t/%s", $token);

echo json_encode([
    'success' => true,
    'token' => $token,
    'short_url' => $shortUrl,
    'expires_at' => $expires_at
]);
