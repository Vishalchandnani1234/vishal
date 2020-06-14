<?php
session_start();
$_SESSION['Vis']="Vishal";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <script src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="css\all.css">
	<link rel="stylesheet" type="text/css" href="login1.css">
	<title></title>
</head>
<body>
<div class="container">
	<div class="text-center">
		<form action="fileupload1.php" method="post" enctype="multipart/form-data">
			<label>Choose file to upload</label><br><br><br>
			<input type="file" name="file" style="margin-left: 40%"><br><br>
			<input type="submit" name="submit">
		</form>
	</div>
</div>
</body>
</html>