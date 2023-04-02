<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['first_name']) && isset($_POST['password'])
    && isset($_POST['last_name'])&& isset($_POST['email']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$first_name = validate($_POST['first_name']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$last_name = validate($_POST['last_name']);
	$email = validate($_POST['email']);

	$user_data = 'first_name='. $first_name. '&last_name='. $last_name. '&email='. $email;


	if (empty($first_name)) {
		header("Location: signup.php?error=First Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}
	else if(empty($last_name)){
        header("Location: signup.php?error=Last Name is required&$user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: signup.php?error=Email is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        // $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE first_name='$first_name' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The First Name is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(first_name, password, last_name, email) VALUES('$first_name', '$pass', '$last_name','$email')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}