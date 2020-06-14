<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <script src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="css\all.css">
  <link rel="stylesheet" type="text/css" href="loginheader.css">
<?php
if(!empty($_SESSION['name']))
{
	echo "<h1 class="."text-center"." id="."service".">Welcome". $_SESSION['name']."</h1><br>";
	echo "<a href='logout.php' class="."logout".">Log out</a><br><br>";
	echo "<a href='loginchangepassword.php' class="."password".">Change Password</a><br><br>";
}
else
{
	header('location:login.php?msg=login First');
}
?>