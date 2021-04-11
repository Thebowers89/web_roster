<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
            margin: auto;
            padding: auto;
        }

        #navbar>ul {
            margin: auto;
            padding-left: 0px;
            background-image: linear-gradient(midnightblue, mediumblue);
        }

        #navbar>ul>li {
            display: inline;
            margin-left: 10px;
            margin-right: 10px;
        }

        #navbar>ul>li>a {
            text-decoration: none;
            color: #ffffffd9;
            font-size: 25px;
        }

        #col {
            display: inline-block;
            width: 45%;
        }

        form {
            border: 1px solid black;
            border-radius: 5px;
            background-color: rgb(219, 238, 202);
            width: 25%;
            margin: auto;
            padding: 10px;
        }

        input {
            margin: auto;
            padding: auto;
            width: 75%;
        }

        input[type=submit] {
            width: 75%;
        }
    </style>
</head>

<body>

    <nav id="navbar">
        <ul>
            <li><a href="/index.html">Home</a></li>
            <li><a href="/roster.html">Roster</a></li>
            <li><a href="/patrol.html">Patrol</a></li>
        </ul>
    </nav>
    <h1 id="userfield">Welcome to Hell, unregistered user!</h1>
    <a href="/test.html">Testing</a>
    <div>
        <!-- <div id="col">
            <h2>Register</h2>
            <form action="/register">
                <label for="fname">First name:</label>
                <input type="text" id="fname" name="fname"><br><br>
                <label for="lname">Last name:</label>
                <input type="text" id="lname" name="lname"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div> -->
        <div id="col">
            <h2>Login</h2>
            <form action="/login.php" method="POST" role="form">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br><br>
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" id="remember">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

</body>

</html>