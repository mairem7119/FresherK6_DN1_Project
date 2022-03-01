<?php
	$con = mysqli_connect("localhost","root","","form_validation");
 
	$errors = array();
 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
	if(preg_match("/\S+/", $_POST['username']) === 0){
		$errors['fname'] = "* First Name is required.";
	}
	if(preg_match("/.+@.+\..+/", $_POST['email']) === 0){
		$errors['email'] = "* Not a valid e-mail address.";
	}
	if(preg_match("/.{8,}/", $_POST['password']) === 0){
		$errors['password'] = "* Password Must Contain at least 8 Chanacters.";
	}
	if(strcmp($_POST['password'], $_POST['confirm_password'])){
		$errors['confirm_password'] = "* Password do not much.";
	}
 
	if(count($errors) === 0){
		$fname = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
 
		$password = hash('sha256', $_POST['password']);
		function createSalt(){
   			$string = md5(uniqid(rand(), true));
    		return substr($string, 0, 3);
		}
		$salt = createSalt();
		$password = hash('sha256', $salt . $password);
 
		$search_query = mysqli_query($con, "SELECT * FROM members WHERE email = '$email'");
		$num_row = mysqli_num_rows($search_query);
		if($num_row >= 1){
			$errors['email'] = "Email address is unavailable.";
		}else{
			$sql = "INSERT INTO members(`fname`, `lname`, `email`, `salt`, `password`) VALUES ('$fname', '$lname', '$email', '$salt', '$password')";
			$query = mysqli_query($con, $sql);
			$_POST['fname'] = '';
			$_POST['lname'] = '';
			$_POST['email'] = '';
 
			$successful = "<h3> You are successfully registered.</h3>";
		}
	}
	}
?>

<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
