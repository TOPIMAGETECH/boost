<?php
// db.php -- include where needed
$DB_HOST = '127.0.0.1';
$DB_NAME = ' review_system ';
$DB_USER = 'opoku12';
$DB_PASS = 'Image@1321@@@';
$DB_DSN  = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);
} catch (PDOException $e) {
    // In production don't echo credentials/errors; log them.
    http_response_code(500);
    exit('DB connection error.');
}
