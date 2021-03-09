<?php
session_start();

$_SESSION['logged_in'] = true; 
$_SESSION['last_activity'] = time(); 
$_SESSION['expire_time'] = 60*10;

if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
    header('Location: logout.php'); 
} else{ 
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="canvas.css">
    <title>Canvas</title>
</head>
<body>
<h1>Canvas</h1>
<div class='logout'>
<a href="logout.php"><button type='button' class='logoutbtn'>Log out</button></a>
</div>
<section>
    <div id='pic-1'>
        <ul>
            <li id='square'><button><img src="square-svgrepo-com.svg"></button></li>
            <li id="triangle"><button><img src="triangle-svgrepo-com.svg"></button></li>
            <li id="polygon"><button><img src="draw-polygon-solid-svgrepo-com.svg"></button></li>
        </ul>
    </div>
    <canvas id="Canvas" width="500" height="400"></canvas>
    <div id='pic-2'>
        <ul>
            <li id="line"><button><img src="line-svgrepo-com.svg"></button></li>
            <li id="circle"><button><img src="circle-svgrepo-com.svg"></i></button></li>
            <li id="ellipse"><button><img src="oval-svgrepo-com.svg"></button></li>
        </ul>
    </div>
    
</section>
<section class='tools'>
    <button id='reset'>Reset</button>

    <input onInput="markerColor = this.value" type="color" class='color-picker'>
    <input onInput="markerWidth = this.value" type="range" min='0' max='100' class='pen-range'>

</section>
<script src="canvas.js"></script>
</body>
</html>