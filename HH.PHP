<?php
if( (!empty($_POST['Category'])) && (!empty($_POST['Brand'])) && (!empty($_POST['Title'])) && (!empty($_POST['Price'])) && (!empty($_POST['Description'])) ) 
{
	$product_id=$_POST['product_id'];
	$Category=$_POST['Category'];
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
	$q="INSERT INTO products(product_id,Categories,Brand,Title,Price,Description,Image) VALUES('".NULL."','".$Category."','".$Brand."','".$Title."','".$Price."','".$Description."','".$num."')";
	echo $q;
	/*mysqli_query($con,$q) or exit('Error in Query');
	header("location:projectform.php?msg=Record Added Successfully");*/
}
?>