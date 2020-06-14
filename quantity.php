<?php
include 'proj.php';
include 'projectconnection.php';
$total=0;
$IP=getIp();
$q="Select * from Cart where Ip_address='$IP'";	
$res=mysqli_query($con,$q) or exit('Error in Query');
while ($row=mysqli_fetch_array($res))
{
	$product_id=$row['product_id'];
	$q_price="Select * from products where product_id='$product_id'";
	$res_price=mysqli_query($con,$q_price) or exit('Error in Query');
	while($vis=mysqli_fetch_array($res_price))
	{
		$Title=$vis['Title'];
		$Price=$vis['Price'];
		$Image=$vis['Image'];
		$product_Price=array($vis['Price']);
		$values=array_sum($product_Price);
		$total+=$values;

		$res=mysqli_query($con,$qty_q);
		$_SESSION['qty']=$qty;
		$total=$total*$qty;
		echo $total;
	}
}
if(!empty($_POST['qty']))
{
	$qty=$_POST['qty'];
	$qty_q="UPDATE cart set qty='$qty'";
}
else
{
	echo $Price;
}		
?>