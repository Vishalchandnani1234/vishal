<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Project1.css">
</head>
<body>

</body>
</html>
<?php
include 'proj.php';
include 'projectconnection.php';
$q="Select * from products";
$v=mysqli_query($con,$q);
while($vis=mysqli_fetch_array($v))
{
	$product_id=$vis['product_id'];
	$Categories=$vis['Categories'];
	$Brand=$vis['Brand'];
	$Title=$vis['Title'];
	$Price=$vis['Price'];
	$Description=$vis['Description'];
	$Image=$vis['Image'];
	echo "
	<div id='product1'>
	<h3>$Title</h3>
	<img src=$Image width='180px' height='180px'/><br><br>
	<p><b>Rs $Price</b></p>
	<a href='Details1.php?product_id=$product_id'><b>Details</b></a>
	<a href='project1.php?product_id=$product_id'><button>Add to Cart</button></a>
	</div>
	";
}
echo "<a href='project1.php' style='margin-top:1500px; margin-left:500px;'><b style='margin-top:100px;'>Go to Home</b></a>"
?>