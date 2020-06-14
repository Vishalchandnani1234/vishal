<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	if(!empty($_GET['msg']))
	{
		echo "<h2 style='margin-left: 40%;'>".$_GET['msg']."</h2>";
	}
	?>
<form method="post" enctype="multipart/form-data">
	<table align="center" width="800px" border="2px" bgcolor="orange">
		<tr align="center">
			<td colspan="8"><h2>Insert New Post Here</h2></td>
		</tr>
		<tr>
			<td align="right">Product Category :</td>
			<td>
				<select name="Categories">
					<option>Select a category</option>
					<?php
						include 'projectconnection.php';
						$q="Select * from categories" ;
						$v=mysqli_query($con,$q);
						while($vis=mysqli_fetch_array($v))
						{
							$Cat_Id=$vis['Cat_Id'];
							$Cat_Text=$vis['Cat_Text'];
							echo "<option value='$Cat_Id'>$Cat_Text</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">Product Brand :</td>
			<td>
				<select name="Brand">
					<option>Select a Brand</option>
					<?php
						include 'projectconnection.php';
						$q="Select * from brands" ;
						$v=mysqli_query($con,$q);
						while($vis=mysqli_fetch_array($v))
						{
							$Brand_Id=$vis['Brand_Id'];
							$Brand_Title=$vis['Brand_Title'];
							echo "<option value='$Brand_Id'>$Brand_Title</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">Product Title :</td>
			<td><input type="text" name="Title"></td>
		</tr>
		<tr>
			<td align="right">Product Price :</td>
			<td><input type="text" name="Price"></td>
		</tr>
		<tr>
			<td align="right">Product Description :</td>
			<td><textarea name="Description"></textarea></td>
		</tr>
		<tr>
			<td align="right">Product Image :</td>
			<td><input type="file" name="Image"></td>
		</tr>
		<tr align="center">
			<td colspan="8"><input type="submit" name="submit" value="Add"></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
if( (!empty($_POST['Categories'])) && (!empty($_POST['Brand'])) && (!empty($_POST['Title'])) && (!empty($_POST['Price'])) && (!empty($_POST['Description'])) ) 
{
	$product_id=$_POST['product_id'];
	$Categories=$_POST['Categories'];
	$Brand=$_POST['Brand'];
	$Title=$_POST['Title'];
	$Price=$_POST['Price'];
	$Description=$_POST['Description'];

	$vis=$_FILES["Image"]["name"];
	$type=$_FILES["Image"]["type"];
	$size=$_FILES["Image"]["size"];
	$tempname=$_FILES["Image"]["tmp_name"];
	$error=$_FILES["Image"]["error"];
	if(file_exists("Images/".$vis))
	{
			echo $vis."  already exists";
			header("location:projectform.php?msg=".$vis."  already exists");
	}
	else
	{
		$num="Images/".$vis;
		move_uploaded_file($tempname,$num);
	}
	include 'projectconnection.php';
	$q="INSERT INTO products(product_id,Categories,Brand,Title,Price,Description,Image) VALUES('".NULL."','".$Categories."','".$Brand."','".$Title."','".$Price."','".$Description."','".$num."')";
	mysqli_query($con,$q) or exit('Error in Query');
	header("location:projectform.php?msg=Record Added Successfully");
}
?>