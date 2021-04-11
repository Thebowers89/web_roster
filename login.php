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

            echo '<p>'.$output.'</p>';
        }

        function createNewUser($conn, $username, $password) {
            $hashedPassword = getHashedPassword($password);
            $sql = "insert into users(username, password) values (?, ?);";
            $stmt = $conn->prepare($sql); 
            $stmt->execute([$_POST['username'], $hashedPassword]);
            var_dump($stmt);
        }
    ?>

    <?php
        $stmt = $pdo->prepare("select username, password from users where username=?");
        $stmt->execute([$_POST['username']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['password'], $result['password'])) {
            echoP("shits not fucked");
        }

        echoP($_POST['username'], ':', getHashedPassword($_POST['password']));

        var_dump($result);

        if ($result) {
            echoP('you are something?');
        } else {
            echoP("you fucked up chief...");
        }
    ?>
    <br>
    <select name="test" id="test">
    <?php
        for ($x = 0; $x < 10; $x++) {
            echo "<option>test".$x."</option>";
        }  
    ?>
    </select>

</body>

</html>