<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if( (!empty($_POST['Name'])) && 
		(!empty($_POST['Class'])) && (!empty($_POST['Sec'])) && 
		(!empty($_POST['RNO'])) && (!empty($_POST['Address'])) && 
		(!empty($_POST['Phone'])))
	{
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
		if(file_exists("upload/".$vis))
		{
				echo $vis."  already exists";
				header("location:search_by_ajax.php?msg=".$vis."  already exists");
		}
		else
		{
			$num="upload/".$vis;
			move_uploaded_file($tempname,$num);
		}
		include 'connection.php';
		$v="INSERT INTO student(AdmNo,Name,Class,Sec,RNO,Address,Phone,Image) VALUES('".Null."','".$Name."','".$Class."','".$Sec."',".$RNO.",'".$Address."',".$Phone.",'".$num."')";
		mysqli_query($con,$v) or exit('Error in Query');
		header("location:search_by_ajax.php?msg=Record Added Successfully");
	}
	else
	{
		"Fill all Fields";
	}
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
	<label style="margin-right: 33px;">Name :</label>
	<input type="text" name="Name"><br><br>
	<label style="margin-right: 33px;">Class :</label>
	<input type="text" name="Class"><br><br>
	<label style="margin-right: 46px;">Sec :</label>
	<input type="text" name="Sec"><br><br>
	<label style="margin-right: 20px;">Roll No :</label>
	<input type="number" name="RNO"><br><br>
	<label style="margin-right: 12px;">Address :</label>
	<input type="text" name="Address"><br><br>
	<label style="margin-right: 27px;">Phone :</label>
	<input type="text" name="Phone"><br><br>
	<label>Image :</label>
	<input type="file" name="file" style="margin-left: 35%;"><br><br>
	<input type="submit" name="submit" style="width: auto; margin-left: 40%;" class="btn btn-success">
</form>
</body>
</html>