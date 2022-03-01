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
                <li><a href="login.php">Logout</a></li><br />
            </ul>
        </r_header>
        <div class="body">
            <h1 id="txt_title">HOME PAGE</h1>
            <?php
            $query = "SELECT * FROM `users` WHERE id = '{$_SESSION['user']}'";
            $run_query = mysqli_query($conn, $query);
            if (mysqli_num_rows($run_query) == 1) {
                while ($result = mysqli_fetch_assoc($run_query)) {
                    $user_name = $result['username'];
                }
                
            }
            
            ?>
            <p style="font-size: 30px;"> Welcom to [<?php echo $user_name;?>]</p>
        </div>
        <div class="footer">
            <h3>All Rights Reserved</h3>
        </div>


</body>

</html>