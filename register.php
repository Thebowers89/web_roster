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

function getHashedPassword($pass) {
    return password_hash($pass, PASSWORD_BCRYPT);
}

function echoP() {
    $output = '';

    foreach (func_get_args() as $arg) {
        $output .= $arg . " ";
    }

    echo '<p>' . $output . '</p>';
}

function createNewUser($conn, $password) {
    $hashedPassword = getHashedPassword($password);
    $sql = "insert into users(username, first_name, last_name, password) values (?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['username'], $_POST['fname'], $_POST['lname'], $hashedPassword]);
    var_dump($stmt); 
}

$stmt = $pdo->prepare("select username from users where username=?");
$stmt->execute([$_POST['username']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    createNewUser($pdo, $_POST['password']);
    header("Location: /index.php");
} else {
    echoP("registration successful?");
}

var_dump($result);
