<?php 
		if(!empty($_GET['q']))
		{
			$val=$_GET['q'];
			$q="Select * from student where name like '%".$val."%' || class like '%".$val."%' || sec like '%".$val."%' || RNO like '%".$val."%'";
		}
		else
		{
			$q="Select * from student" ;		
		}
		if(!empty($_GET['msg']))
		{
			echo "<h3>".$_GET['msg']."</h3>";
		}
		?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="showall1.css">
	</head>
	<body>
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
			<th>Image</th>
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
				echo "<td><a href='edit.php?AdmNo=$get[0]&Name=$get[1]&Class=$get[2]&Sec=$get[3]&RNO=$get[4]&Address=$get[5]&Phone=$get[6]&Image=$get[7]'>Edit</a>";
				echo "<td><a href='delete.php?AdmNo=$get[0]'>Delete</a>";
				echo "<td><img src='".$get[7]."' width='100'>";
			}
			echo "</table>";
		}
		else
		{
			echo "No record found";
		}
?>