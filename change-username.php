<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['first_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Username</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="change-u.php" method="post">
     	<h2>Change First Name</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Current First Name</label>
     	<input type="name" 
     	       name="cu" 
     	       placeholder="first name">
     	       <br>

     	<label>New First Name</label>
     	<input type="name" 
     	       name="nu" 
     	       placeholder="new first name">
     	       <br>

     	<button type="submit">CHANGE</button>
          <a href="home.php" class="ca">HOME</a>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>