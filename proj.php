<?php

function getdata()
{
	include 'projectconnection.php';
	$q="Select * from categories" ;
	$v=mysqli_query($con,$q);
	while($vis=mysqli_fetch_array($v))
	{
		$Cat_Id=$vis['Cat_Id'];
		$Cat_Text=$vis['Cat_Text'];
		echo "<li><a href='project2.php?Cat_Id=$Cat_Id' style='text-decoration:none'>$Cat_Text</a></li>";
	}
}

function getbrands()
{
	include 'projectconnection.php';
	$q="Select * from brands" ;
	$v=mysqli_query($con,$q);
	while($vis=mysqli_fetch_array($v))
	{
		$Brand_Id=$vis['Brand_Id'];
		$Brand_Title=$vis['Brand_Title'];
		echo "<li><a href='project2.php?Brand_Id=$Brand_Id' style='text-decoration:none'>$Brand_Title</a></li>";
	}
}

function getcontent()
{
	if(empty($_GET['Cat_Id']))
	{
		if(empty($_GET['Brand_Id']))
		{
			include 'projectconnection.php';
			$q="Select * from products";
			$v=mysqli_query($con,$q);
			$count=mysqli_fetch_array($v);
			while($vis=mysqli_fetch_array($v))
			{
				if($count==5)
				{
					break;
				}
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
				<img src=$Image width='180px' height='180px' object-fit='cover'/><br><br>
				<p><b>Rs $Price</b></p>
				<a href='Details1.php?product_id=$product_id'><b>Details</b></a>
				<a href='project1.php?cart_id=$product_id'><button>Add to Cart</button></a>
				</div>
				";
			}
		}
	}	
}

function getdata1()
{
	if(!empty($_GET['Cat_Id']))
	{
		$Cat_Id=$_GET['Cat_Id'];
		include 'projectconnection.php';
		$q="Select * from products where Categories='$Cat_Id'";
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
			<img src=$Image width='180px' height='180px' object-fit='cover'/><br><br>
			<p><b>Rs $Price</b></p>
			<a href='Details1.php?product_id=$product_id'><b>Details</b></a>
			<a href='project1.php?cart_id=$product_id'><button>Add to Cart</button></a>
			</div>
			";
		}
	}
}

function getbrands1()
{
	if(!empty($_GET['Brand_Id']))
	{
		$Brand_Id=$_GET['Brand_Id'];
		include 'projectconnection.php';
		$q="Select * from products where Brand='$Brand_Id'";
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
			<img src=$Image width='180px' height='180px' object-fit='cover'/><br><br>
			<p><b>Rs $Price</b></p>
			<a href='Details1.php?product_id=$product_id'><b>Details</b></a>
			<a href='project1.php?cart_id=$product_id'><button>Add to Cart</button></a>
			</div>
			";
		}
	}
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

function cart()
{
	$IP=getIp();
	if(!empty($_GET['cart_id']))
	{
		$cart_id=$_GET['cart_id'];
		include 'projectconnection.php';
		$q="Select * from Cart where Ip_address='$IP' AND product_id='$cart_id'";
		$res=mysqli_query($con,$q);
		if(mysqli_num_rows($res))
		{
			echo "";
		}
		else
		{
			$insert="INSERT into cart (product_id,Ip_address) VALUES('$cart_id','$IP')";
			$run=mysqli_query($con,$insert);
			header('location:project1.php');
		}
	}
}

function items()
{
	if(isset($_GET['cart_id']))
	{
		include 'projectconnection.php';
		$IP=getIp();
		$cart_id=$_GET['cart_id'];
		$q="Select * from Cart where Ip_address='$IP' AND product_id='$cart_id'";
		$res=mysqli_query($con,$q);
		$count=mysqli_num_rows($res);
		echo $count;
	}
	else
	{
		include 'projectconnection.php';
		$IP=getIp();
		//$cart_id=$_GET['cart_id'];
		$q="Select * from Cart where Ip_address='$IP'"; 
		$res=mysqli_query($con,$q);
		$count=mysqli_num_rows($res);
		echo $count;	
	}
}

function Price()
{
		$total=0;
		include 'projectconnection.php';
		$IP=getIp();
		$q="Select * from Cart where Ip_address='$IP'";
		$res=mysqli_query($con,$q);
		while($price=mysqli_fetch_array($res))
		{
			$product_id=$price['product_id'];
			$q_price="Select * from products where product_id='$product_id'";
			$res_price=mysqli_query($con,$q_price) or exit('Error in Query');
			while($vis=mysqli_fetch_array($res_price))
			{
				$product_Price=array($vis['Price']);
				$values=array_sum($product_Price);
				$total=$total+$values;
			}
		}
		echo $total;

}

?>