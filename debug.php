<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    error_reporting(E_ALL);
    ini_get("display_errors", 1);

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
    ?>
    <h2>fuuuuuck</h2>

    <a href="/register.html">Registration</a>
    <a href="/main.html">Main page</a>

    <form action="debug_action.php" method="post">
        <select name="user" id="user">
            <?php
            $stmt = $pdo->query("select username from users;");
            foreach ($stmt as $row) {
                echo "<option>" . $row['username'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="action" value="Delete">
    </form>

</body>

</html>