<?php
include("config.php");
include("functions.php");
?>

<?php

$email = mysqli_real_escape_string($con, $_POST["email1"]);
$password = mysqli_real_escape_string($con, $_POST["password1"]);


if (isset($_POST['loginbtn'])) {
    $login_email = inject_checker($con, $email);
    $login_password = inject_checker($con, $password);
    if (empty($login_email)) {
        echo  "<li>Email Field Can not be empty!</li>";
    } elseif (empty($login_password)) {
        echo  "<li>Password Field Can not be empty!</li>";
    } else {
        $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
        $run_query = mysqli_query($con, $sql);

        $result = mysqli_fetch_assoc($run_query);

        if (mysqli_num_rows($run_query) == 1) {
            session_start();
            var_dump($result);
            if (!$result) {
                echo '<li> Username password combination is wrong!</li>';
            } else if (password_verify($password, $result['password'])) {
                $user_id = $result['id'];
                $_SESSION['user'] = $user_id;
                echo '<li> Congratulations, you are logged in!</li>';
                header('Location: home.php');
            }
        } else {
            echo "<li>Login failed. Invalid email or password</li>";
        }
    }
}

?>



