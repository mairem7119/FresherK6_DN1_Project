<?php
include "User.php";
include "config.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
    if ($_POST['password_1'] != $_POST['password_2']) {
        echo ("Oops! Password did not match! Try again");
        exit();
    }

    //check xem account da ton tai hay chua
    $stmt1 = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt1->bind_param('s', $_POST['email']);
    $stmt1->execute();
    $stmt1->store_result();
    //store result de luu ket qua va doi chieu
    if ($stmt1->num_rows > 0) {
        // email da ton tai
        echo ("email exists, please choose another!");
    } else {
        //tao tai khoan moi
        $stmt2 = $conn->prepare('INSERT INTO users(username, password, email) VALUES(?, ?, ?)');
        if ($stmt2) {
            // ma hoa mat khau trong database
            $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT);
            $stmt2->bind_param('sss', $_POST['username'], $password, $_POST['email']);
            $stmt2->execute();
            $stmt2->close();
            echo "SUCCESS";
            //header('Location: Outpage.php');
        } else {
            echo ("Username exists, please choose another!");
        }
    }

    $stmt1->close();
    $conn->close();
}
