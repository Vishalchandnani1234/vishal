<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <script src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="css\all.css">
  <link rel="stylesheet" type="text/css" href="Project.css">

	<title></title>
</head>
<body>
<div class="container">
	<?php
if(!empty($_GET['msg']))
{
	echo "<h3 style='text-align:center'>".$_GET['msg']."</h3>";
}
?>
	<div class="text-center">
		<form method="post">
			<h1>Login</h1><br><br>
			<label>Username</label><br>
			<i class="fas fa-user"><input type="text" name="Username" placeholder="Type Your Username"></i><br><br>
			<label>Password</label><br>
			<i class="fas fa-unlock"><input type="Password" name="Password" placeholder="Enter Password"></i><br><br>
			<input type="submit" name="" class="btn btn-success" value="LOGIN"><br><br><br><br>
			<h6>Have not account yet?</h6>
			<a href="projectsignup.php">SIGN UP</a>
		</form>
	</div>
</div>
</body>
</html>