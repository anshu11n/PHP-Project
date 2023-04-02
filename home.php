<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['first_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
     <!-- <h1>Email = <?php echo $_SESSION['email']; ?></h1> -->
     <h1>Hello <?php echo $_SESSION['first_name']," ", $_SESSION['last_name']; ?></h1>
     <nav class="home-nav">
     	<a href="change-password.php" >Update Password</a>
          <br>
          <br>
     	<a href="change-username.php">Update First Name</a>
          <br>
          <br>
     	<a href="change-lastname.php">Update Last Name</a>
          <br>
          <br>
     	<a href="delete-account.php">Delete Account</a>
          <br>
          <br>
          <a href="logout.php">Sign Out</a>
     </nav>
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>