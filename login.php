<?php

    // echo '<pre>';
    // var_dump($_POST);
    // echo '<pre>';

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=users','root','');
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = $_POST["User_Name"];
        $psw = $_POST["psw"];

        $statement = $pdo->prepare("SELECT * FROM users WHERE `User name`=:username AND `Password`=:psw");
        $statement-> execute(array(":username" =>$_POST["User_Name"], ":psw" =>$psw = $_POST["psw"]));

        $count = $statement-> rowCount();

        if ($count >= 1) {
            header('location: canvas.php');
        } else {
            echo 'wrong user name or password';
        }
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
    <h1>Login</h1>
    <section id=login>
        <form action="" method="post">
            <label for="User Name"><b>User Name</b></label>
                <input type="text"  name="User Name" id="UserName" required>
                

            <label for="psw"><b>Password</b></label>
                <input type="password"  name="psw" id="psw" required>
                <p class='validation'></p>

            <button type='submit' class='loginbtn'>Login</button>
        </form>
    </section>
    <p class='validation'></p>
</body>
</html>