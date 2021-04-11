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

$list = array("Sheriff/180",
"Undersheriff/170",
"Major/160",
"Captain/150",
"Lieutenant/140",
"Master Sergeant/130",
"Sergeant First Class/120",
"Staff Sergeant/110",
"Senior Sergeant/100",
"Sergeant/90",
"Senior Corporal/80",
"Corporal/70",
"Senior Deputy/60",
"Deputy III/50",
"Deputy II/40",
"Deputy I/30",
"Probationary Deputy/20",
"Reserve Deputy/10");

foreach ($list as $str) {
    list($rank, $power) = explode("/", $str);
    $stmt = $pdo->prepare("insert into ranks(rank, power) values (?, ?)");
    $stmt->execute([$rank, $power]);
}

echo "Good fuckin luck!";