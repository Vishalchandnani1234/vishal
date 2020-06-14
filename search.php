<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="showall1.css">
	<title></title>
</head>
<body>
	<a href="conform1.php"><input type="button" name="" value="Add"> </a><br><br>
	
	<form method="post">
		<input type="text" name="val">
		<input type="submit">
	</form>
	<?php 
		if(!empty($_POST['val']))
		{
			$val=$_POST['val'];
			$q="Select * from student where name like '%".$val."%'" ;
		}
		else
		{
			$q="Select * from student" ;		
		}
		?>
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
		$res=mysqli_query($con,$q) or exit('Error in query');
		if(mysqli_num_rows($res)>0)
		{
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
		}
		else
		{
			echo "No record found";
		}
?>