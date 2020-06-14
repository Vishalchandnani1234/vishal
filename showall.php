<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="showall1.css">
	<title></title>
</head>
<body>
<?php
	if(!empty($_GET['msg']))
	{
		echo "<h3>".$_GET['msg']."</h3>";
	}
?>
	<a href="conform1.php"><input type="submit" name="" value="Add"> </a><br><br>
	<table>
		<tr>
			<th>AdmNo</th>
			<th>Name</th>
			<th>Class</th>
			<th>Sec</th>
			<th>RNO</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
</body>
</html>
<?php
	include 'connection.php';
	$q="Select * from student";
	$res=mysqli_query($con,$q) or exit('Error in query');
	while($get=mysqli_fetch_array($res))//function to get rows from database
	{
		echo "<tr>";
		echo "<td>$get[0]";
		echo "<td>$get[1]";
		echo "<td>$get[2]";
		echo "<td>$get[3]";
		echo "<td>$get[4]";
		echo "<td>$get[5]";
		echo "<td>$get[6]";
		echo "<td><a href='edit.php?AdmNo=$get[0]&Name=$get[1]&Class=$get[2]&Sec=$get[3]&RNO=$get[4]&Address=$get[5]&Phone=$get[6]'>Edit</a>";
		echo "<td><a href='delete.php?AdmNo=$get[0]'>Delete</a>";

	}
		echo "</table>";
?>