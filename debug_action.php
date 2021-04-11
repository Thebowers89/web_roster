<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$host = 'localhost';
$db   = 'testdb';
$user = 'bbaggins';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$username = $_POST['user'];
$action = $_POST['action'];

if ($action == "Delete") {
    $stmt = $pdo->prepare("delete from users where username = ?");
    $stmt->execute([$username]);
}

header("Location: /debug.php");