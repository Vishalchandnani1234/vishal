<?php
	include 'projectconnection.php';
	include 'proj.php';
	if(!empty($_GET['product_search']))
	{	
		$product_search=$_GET['product_search'];
		$q="Select * from products where Title like '%$product_search%'";
	}
	else
	{
		getcontent();
		getbrands1();
		getdata1();
	}			
		@$v=mysqli_query($con,$q);
		while(@$vis=mysqli_fetch_array($v))
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
?>