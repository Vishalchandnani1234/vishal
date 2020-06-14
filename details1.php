<!DOCTYPE html>
<?php
	session_start();
	include 'proj.php';
?>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="css\all.css">
  <link rel="stylesheet" type="text/css" href="Project1.css">
</head>
<body>
<!---------------------------------Heading------------------------------------->






<!---------------------------------Navbar---------------------------------------------------->
<nav class="navbar navbar-inverse">
	<div class="container">
		<ul class="nav navbar-nav navbar-header">
			<header>Project</header>
		</ul>
		<ul class="nav navbar-nav navbar-right" id="navigation">
			<li><a href="project1.php">Home</a></li>
			<li><a href="allproducts.php">All Products</a></li>
			<li><a href="myaccount.php">My Account</a></li>
			<li><a href="cart.php">Cart</a></li>
			<li><a href="">Contact</a></li>
			<i class="fas fa-search"></i><input type="text" name="product_search" placeholder="Search Products" onkeyUp="f()" id="val">
		</ul>
	</div>
</nav>
<!--------------------------------------------Sidebar------------------------------------->

<div class="Sidebar">
	<div class="Sidebar_Content">
		<div>
			<ul class="Sidebar_Title">
				<h3>Categories</h3>
			</ul>
			<ul id="Sidebar">
			<?php	
				getdata();
			?>	
			</ul>
		</div>
		<div>
			<ul class="Sidebar_Title">
				<h3>Brands</h3>
			</ul>
			<ul id="Sidebar">
				<?php
					getbrands();
				?>
			</ul>
		</div>
	</div>
	<!--------------------------------------------Content------------------------------------------------>
	<div class="Content">
		<div class="Cart">
			<p id="Cart1">Total Items <?php items(); ?></p><p id="Cart1">Welcome !<a href="cart.php" style="margin-left: 15px;">Go to Cart</a></p>
			<?php cart(); ?> 
			<div id="Cart1">
			<?php

				if(!isset($_SESSION['customer_email']))
				{
					echo "<a href='checkout.php' style='color:orange;'>Login</a>";
				}
				else
				{
					echo "<a href='projectlogout.php' style='color:orange;'>Logout</a>";
				}
			?>
			</div>
		</div>
		<div id="product">
			<?php
				include 'projectconnection.php';
				if( (isset($_GET['product_id'])) )
				{	
					$product_id=$_GET['product_id'];
					$q="Select * from products where product_id='$product_id'";
					$v=mysqli_query($con,$q) or exit('Error in query');
					while($vishal=mysqli_fetch_array($v))
					{
					$Categories=$vishal['Categories'];
					$Brand=$vishal['Brand'];
					$Title=$vishal['Title'];
					$Price=$vishal['Price'];
					$Description=$vishal['Description'];
					$Image=$vishal['Image'];
					echo "
					<div id='product1'>
					<h3>$Title</h3>
					<img src=$Image width='400px' height='300px'/><br><br>
					<div>$Description</div>
					<p><b>Rs $Price</b></p>
					<a href='project1.php'><b>Go To Home</b></a>
					<a href='details1.php?cart_id=$product_id'><button>Add to Cart</button></a>
					</div>
					";
					}
				}	
				?>
			
			
			
		</div>	
	</div>
</div>
<div class="footer">
	
</div>
<script src="jquery.js"></script>
<script src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
<script>
	f();
	function f()
	{
		val=document.getElementById('val').value;
		if(val.length==0)
		{
			v="projectsearch.php";			
		}	
		else
		{
			v="projectsearch.php?product_search=" + val
		}
		var xmlhttp = new XMLHttpRequest();
    	xmlhttp.onreadystatechange = function() 
    	{
        	if (this.readyState == 4 && this.status == 200) 
        	{
            	document.getElementById("res").innerHTML = this.responseText;
        	}
    	};
        xmlhttp.open("GET",v, true);
        xmlhttp.send(v);
	}
</script>
</body>
</html>