<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=users','root','');
$pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo '<pre>';
// var_dump($_GET);
// echo '<pre>';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Firstname = $_POST["First_Name"];
    $Lastname = $_POST["Last_Name"];
    $Birthdate = $_POST["birthdate"];
    $Username = $_POST["User_Name"];
    $psw = $_POST["psw"];

    $statement = $pdo->prepare("INSERT INTO users (`First Name`, `Last Name`, `Birthdate`, `User name`, `Password`)
                                VALUES (:Firstname, :Lastname, :Birthdate, :Username, :psw)");
    $statement-> bindValue(":Firstname", $Firstname);
    $statement-> bindValue(":Lastname", $Lastname);
    $statement-> bindValue(":Birthdate", $Birthdate);
    $statement-> bindValue(":Username", $Username);
    $statement-> bindValue(":psw", $psw);
    $statement-> execute();

    header("Location: canvas.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="index.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lobster" />
    <title>Document</title>
</head>
<body>
<!-- <div class="loader">
	<div class="yellow"></div>
	<div class="red"></div>
	<div class="blue"></div>
	<div class="violet"></div>
</div>  -->
    <section class="Loginform">
            <div class='register'>
                <h1>Register or Login</h1>
            </div>
        <form action="" method="post">
            <div class="container">

                <label for="First Name"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="First Name" id="FirstName" required>
                

                <label for="Last Name"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="Last Name" id="LastName" required>
            

                <label for="birthdate">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate">
                

                <label for="User Name"><b>User Name</b></label>
                <input type="text" placeholder="Enter User Name" name="User Name" id="UserName" required>
                

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                <p class='validation'></p>

                <button type="submit" class="registerbtn" onClick="return validate()">Register</button>
                <p>Already registered? <br><a href="login.php" class="loginbtn" >Login here</a></p>  
            </div>
        </form>             
    </section>
    

<script src="app.js"></script>
</body>
</html>