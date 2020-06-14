<!DOCTYPE html>
<?php
session_start();
include 'proj.php';

?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="Project1.css">
</head>
<body>
<div id="product">
	<form method="post" enctype="multipart/form-data">
		<table align="center" width="800px" border="2px">
			<tr align="center">
				<th>Remove</th>
				<th>Products</th>
				<th>Quantity</th>
				<th>Price of each</th>
			</tr>
			<?php
				$total=0;
				include 'projectconnection.php';
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
			?>
			<tr align="center">
				<td><input type="checkbox" name="remove[]" value="<?php echo $product_id; ?>"></td>
				<td><?php echo $Title; ?><br>
				<img src="/<?php echo $Image; ?>" width="60" height="60"/>
				</td>
				<td><input type="text" name="qty" size="5"></td>
				<?php
				if(isset($_POST['updatecart']))
				{
					$qty=$_POST['qty'];
					$q_qty="UPDATE cart set qty='$qty'";
					$res_qty=mysqli_query($con,$q_qty);
					$_SESSION['qty']=$qty;
					$total=$total*$qty;
				}
				?>
				<td><?php echo $Price; ?></td>
			</tr>
		<?php }} ?>
			<tr align="right" style="margin-right: 100px;">
				<td colspan="4">Sub Total=> 
				Rs<?php echo $total; ?></td>
			</tr>
			<tr align="center"> 
				<td><input type="submit" name="updatecart" value="Updatecart"></td>
				<td><input type="submit" name="Continue" value="Continue Shopping"></td>
				<td><a href="checkout.php"><input type="button" name="" value="CheckOut"></a></td>
			</tr>
		</table>
		<h3><a href="Project1.php">Go to Home</a></h3>
	</form>
</div>
<?php
function updatecart()
{
	include 'projectconnection.php';
	$IP=getip();
	if(isset($_POST['updatecart']))
	{
		foreach($_POST['remove'] as $remove_id)
		{
			$q="DELETE from cart where product_id='$remove_id' AND Ip_address='$IP'";
			$res=mysqli_query($con,$q);
			if($res)
			{
				header('location:cart.php');
			}
		}
	}
}
echo @$up_cart=updatecart();
?>

</body>
</html>