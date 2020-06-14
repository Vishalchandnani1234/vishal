<?php
if( (!empty($_GET['AdmNo'])) )
{
	$AdmNo=$_GET['AdmNo'];
	$q="delete from student WHERE AdmNo='".$AdmNo."'";
	include('connection.php');
	mysqli_query($con,$q) or exit('Error in Open');
	echo "Record Deleted successfully";
	header('location:search_by_ajax.php?msg=Record Deleted Successfully');
}
?>