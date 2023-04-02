<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['first_name'])) {

    include "db_conn.php";

if (isset($_POST['cu']) && isset($_POST['nu'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$cu = validate($_POST['cu']);
	$nu = validate($_POST['nu']);
    
    if(empty($cu)){
      header("Location: change-username.php?error=Current First Name is required");
	  exit();
    }else if(empty($nu)){
      header("Location: change-username.php?error=New First Name is required");
	  exit();
    }else if($cu == $nu){
      header("Location: change-username.php?error=The new First Name and old First Name are exact same");
	  exit();
    }else {
    	// hashing the username
    	// $cu = md5($cu);
    	// $nu = md5($nu);
        $id = $_SESSION['id'];

        $sql = "SELECT first_name
                FROM users WHERE 
                id='$id' AND first_name='$cu'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET first_name='$nu'
        	          WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
        	echo '<script>alert("Your First Name has been changed successfully");window.location.href="http://localhost/login-reg-change/index.php"</script>';
	        exit();

        }else {
        	header("Location: change-username.php?error=Incorrect username");
	        exit();
        }

    }

    
}else{
	header("Location: change-username.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}