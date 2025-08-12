<?php
// redirect.php
require_once __DIR__ . '/db.php';

$token = $_GET['token'] ?? '';

if (!$token) {
    http_response_code(400);
    echo 'Missing token.';
    exit;
}

// Fetch the token row
$sql = "SELECT id, token, target, expires_at, uses FROM short_urls WHERE token = :token LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([':token' => $token]);
$row = $stmt->fetch();

if (!$row) {
    http_response_code(404);
    echo 'Not found.';
    exit;
}

$now = new DateTime('now', new DateTimeZone('UTC'));
$expires = DateTime::createFromFormat('Y-m-d H:i:s', $row['expires_at'], new DateTimeZone('UTC'));

if ($now > $expires) {
    // Optionally permanently delete or mark expired
    // $del = $pdo->prepare("DELETE FROM short_urls WHERE id = :id");
    // $del->execute([':id' => $row['id']]);

    http_response_code(410); // Gone
    echo 'This link has expired.';
    exit;
}

// increment uses (optional analytics)
$update = $pdo->prepare("UPDATE short_urls SET uses = uses + 1 WHERE id = :id");
$update->execute([':id' => $row['id']]);

$target = $row['target'];

// Strict redirect rules: allow only same-origin relative paths or valid absolute URLs
if (str_starts_with($target, '/')) {
    // relative path on this domain
    header("Location: {$target}", true, 302);
    exit;
}

if (preg_match('#^https?://#i', $target)) {
    // optional: verify host is allowed to prevent open redirect abuse
    $allowedHosts = ['boostrika.com', 'www.boostrika.com'];
    $host = parse_url($target, PHP_URL_HOST);
    if (!in_array($host, $allowedHosts, true)) {
        // If you want to allow external redirects, remove this check.
        http_response_code(400);
        echo 'External redirects not allowed.';
        exit;
    }
    header("Location: {$target}", true, 302);
    exit;
}

http_response_code(400);
echo 'Invalid target.';
