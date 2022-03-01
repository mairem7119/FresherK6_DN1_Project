<?php 
   $DATABASE_HOST = 'localhost';
   $DATABASE_USER = 'root';
   $DATABASE_PASS = '';
   $DATABASE_NAME = 'registration';

   $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

   if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
  
   //Kiem tra xem da nhap data hay chua, isset kiem tra data ton tai k.
   if(!isset($_POST['username']) || empty($_POST['username']) || !isset($_POST['password_1']) 
   || empty($_POST['password_1']) || !isset($_POST['email']) || empty($_POST['email']) ){
        echo( "<script type='text/javascript'>alert('Please complete the registration form!');</script>");
        exit();
   }
   // Check pasword and confirm pw is matching
   $message = "Oops! Password did not match! Try again";
   if($_POST['password_1'] != $_POST['password_2']){
        echo( "<script type='text/javascript'>alert('$message');</script>");
        exit();
   }

    //check xem account da ton tai hay chua
    $stmt1 = $con->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt1->bind_param('s', $_POST['username']);
    $stmt1->execute();
    $stmt1->store_result();
    //store result de luu ket qua va doi chieu
    if($stmt1->num_rows > 0){
        // username da ton tai
        echo ( "<script type='text/javascript'>alert('Username exists, please choose another!');</script>");
    }else{
        //tao tai khoan moi
        $stmt2 = $con->prepare('INSERT INTO users(username, password, email) VALUES(?, ?, ?)');
        if($stmt2){
            // ma hoa mat khau trong database
            $password = password_hash($_POST['password_1'], PASSWORD_DEFAULT);
            $stmt2->bind_param('sss', $_POST['username'], $password, $_POST['email']);
            $stmt2->execute();
            $stmt2->close();

            header('Location: Outpage.php');

        }else{
            echo ( "<script type='text/javascript'>alert('Username exists, please choose another!');</script>");
        }
    }

    $stmt1->close();
    $con->close();
?>

