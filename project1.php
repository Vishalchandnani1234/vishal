<!DOCTYPE html>
<?php
	session_start();
	include 'proj.php';
	if(!empty($_GET['msg']))
	{
		echo "<h3 class='text-center'>".$_GET['msg']."</h3>";
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="css\all.css">
  <link rel="stylesheet" type="text/css" href="project11.css">
</head>
<body>
<!---------------------------------Heading------------------------------------->






<!---------------------------------Navbar---------------------------------------------------->
<nav class="navbar navbar-inverse">
	<div class="container">
		<ul class="nav navbar-nav navbar-header">
			<header>Project</header>
		</ul>
		<div class="menu-toggle">
			<i class="fa fa-bars menu" aria-hidden="true" style="margin-top: -10px;"></i>
		</div>
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
			<div id="res"></div>
			
			
			
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
<script type="text/javascript">
	$(document).ready(function(){
		$('.menu').click(function(){
			$('#navigation li').slideToggle('.active');
		});
	});
	$(document).ready(function(){
		$('#')
	})
</script>
</body>
</html>