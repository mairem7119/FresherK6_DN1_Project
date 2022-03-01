<?php

require_once("user_session.php");
require_once("config.php");
require_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <r_header class="r_header">
            <a>DEMO</a>

            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <ul class="dropdown-content">
                <li><a href="homepage.php">Home</a></li><br />
                <li><a href="login.php">Login</a></li><br />
                <li><a href="index.php">Register</a></li><br />               
            </ul>
        </r_header>
        <div class="body">
            <h1 id="txt_title">HOME PAGE</h1>           
            <p style="font-size: 30px;"> Welcom to our website</p>
        </div>
        <div class="footer">
            <h3>All Rights Reserved</h3>
        </div>


</body>

</html>