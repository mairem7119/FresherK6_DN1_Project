<?php
include("config.php");
$conn = mysqli_connect('localhost','root','','registration');
if(!$conn)
  die("Connection Error");

// $email = $_POST["email"];
// $pass = $_POST["password"];
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

if($email!="" && $password!=""){
    $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
 // $sql="SELECT * FROM users WHERE email='".mysqli_real_escape_string($conn,$email)."' and password='".mysqli_real_escape_string($conn,$pass)."'";
  $rss = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($rss);
  if(mysqli_num_rows($rss)>0){
    session_start();
    echo "SUCCESS";
    $_SESSION['user'] = $result['id'];
  }
  else{
    echo "ERROR";
  }
}
else{
  echo "ERROR";
}
