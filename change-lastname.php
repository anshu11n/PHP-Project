<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['last_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Last Name</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="change-l.php" method="post">
     	<h2>Change Last Name</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Current Last Name</label>
     	<input type="name" 
     	       name="cu" 
     	       placeholder="last name">
     	       <br>

     	<label>New Last Name</label>
     	<input type="name" 
     	       name="nu" 
     	       placeholder="new last name">
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