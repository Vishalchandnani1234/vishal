<?php
$Image="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if( (!empty($_POST['AdmNo'])) && (!empty($_POST['Name'])) && 
		(!empty($_POST['Class'])) && (!empty($_POST['Sec'])) && 
		(!empty($_POST['RNO'])) && (!empty($_POST['Address'])) &&
		(!empty($_POST['Phone'])) )
	{
		$AdmNo=$_POST['AdmNo'];
		$Name=$_POST['Name'];
		$Class=$_POST['Class'];
		$Sec=$_POST['Sec'];
		$RNO=$_POST['RNO'];
		$Address=$_POST['Address'];
		$Phone=$_POST['Phone'];
		
		$vis=$_FILES["file"]["name"];
		$type=$_FILES["file"]["type"];
		$size=$_FILES["file"]["size"];
		$tempname=$_FILES["file"]["tmp_name"];
		$error=$_FILES["file"]["error"];
		if(!empty($_FILES['file']['name']))
		{
			if(!empty($_POST['OldImage']))
			{
				unlink($_POST['OldImage']);
			}
		}
		if(!empty($_FILES['file']['name']))
		{
			if(file_exists("upload/".$vis))
			{
				header("location:search_by_ajax.php?msg=".$vis."  already exists");
			}
			else
			{
				$num="upload/".$vis;
				move_uploaded_file($tempname,$num);
			}
			$q="UPDATE student set  Name='".$Name."', Class='".$Class."', Sec='".$Sec."', RNO='".$RNO."', Address='".$Address."', Phone='".$Phone."', Image='".$num."' WHERE AdmNo='".$AdmNo."'";
			include('connection.php');
			mysqli_query($con,$q) or exit('Error in Open');
			header('location:search_by_ajax.php?msg=Record updated successfully');
		}
		else
		{
			$q="UPDATE student set  Name='".$Name."', Class='".$Class."', Sec='".$Sec."', RNO='".$RNO."', Address='".$Address."', Phone='".$Phone."' WHERE AdmNo='".$AdmNo."'";
			echo $q;
			include('connection.php');
			mysqli_query($con,$q) or exit('Error in Open');
			header('location:search_by_ajax.php?msg=Record updated successfully');	
		}
	}
}
else if( (!empty($_GET['AdmNo']))  && (!empty($_GET['Name'])) &&
		(!empty($_GET['Class'])) && (!empty($_GET['Sec'])) && 
		(!empty($_GET['RNO'])) && (!empty($_GET['Address'])) && 
		(!empty($_GET['Phone'])))
	{
		$AdmNo=$_GET['AdmNo'];
		$Name=$_GET['Name'];
		$Class=$_GET['Class'];
		$Sec=$_GET['Sec'];
		$RNO=$_GET['RNO'];
		$Address=$_GET['Address'];
		$Phone=$_GET['Phone'];
		$Image=$_GET['Image'];
	}
else
{
	header('location:search_by_ajax.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.4.1-dist\css\bootstrap.min.css">
  <script src="bootstrap-3.4.1-dist\js\bootstrap.min.js"></script>
  <link rel="stylesheet" href="css\all.css">
  <link rel="stylesheet" type="text/css" href="showall1.css">
	<title></title>
</head>
<body>
<form method="post" enctype="multipart/form-data"><br>
	<label style="margin-right: 20px;">AdmNo :</label>
	<input type="text" name="AdmNo" value="<?php echo $AdmNo; ?>" readonly="readonly"><br><br>
	<label style="margin-right: 33px;">Name :</label>
	<input type="text" name="Name" value="<?php echo $Name; ?>"><br><br>
	<label style="margin-right: 33px;">Class :</label>
	<input type="text" name="Class" value="<?php echo $Class; ?>"><br><br>
	<label style="margin-right: 46px;">Sec :</label>
	<input type="text" name="Sec" value="<?php echo $Sec; ?>"><br><br>
	<label style="margin-right: 20px;">Roll No :</label>
	<input type="number" name="RNO" value="<?php echo $RNO; ?>"><br><br>
	<label style="margin-right: 12px;">Address :</label>
	<input type="text" name="Address" value="<?php echo $Address; ?>"><br><br>
	<label style="margin-right: 27px;">Phone :</label>
	<input type="text" name="Phone" value="<?php echo $Phone; ?>"><br><br>
	<input type="hidden" name="OldImage" value="<?php echo $Image; ?>"><br><br>
	<?php if(!empty($Image)) ?>
		<img src='<?php echo $Image; ?>' width="200"> 
	<label style="margin-right: 27px;">Image :</label>
	<input type="file" name="file" style="margin-left: 35%"><br><br>
	<input type="submit" name="" value="Update" style="margin-left: 40%" class="btn btn-success">
</form>
</body>
</html>