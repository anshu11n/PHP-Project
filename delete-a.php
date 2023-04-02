<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['first_name'])) {

    include "db_conn.php";

if (isset($_POST['cud']) && isset($_POST['pd'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$cud = validate($_POST['cud']);
	$pd = validate($_POST['pd']);
    
    if(empty($cud)){
      header("Location: delete-account.php?error=First Name is required");
	  exit();
    }else if(empty($pd)){
      header("Location: delete-account.php?error=Password is required");
	  exit();
    }else {
    	// hashing the username
    	// $cu = md5($cu);
    	// $nu = md5($nu);
        $id = $_SESSION['id'];

        $sql = "SELECT first_name,password
                FROM users WHERE 
                id='$id' AND first_name='$cud' AND password='$pd'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	// $sql_2 = "UPDATE users
        	//           SET user_name='$nu'
        	//           WHERE id='$id'";
        	$sql_2 = "DELETE FROM users WHERE id='$id'";
        	mysqli_query($conn, $sql_2);
            echo '<script>alert("Your Account has been deleted successfully");window.location.href="http://localhost/login-reg-change/index.php"</script>';
	        exit();

        }else {
        	header("Location: delete-account.php?error=Incorrect credentials");
	        exit();
        }

    }

    
}else{
	header("Location: delete-account.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}