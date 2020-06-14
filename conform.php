<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if((!empty($_POST['AdmNo'])) && (!empty($_POST['Game'])) && (!empty($_POST['CoachName'])) && (!empty($_POST['Grade'])))
	{
		$AdmNo=$_POST['AdmNo'];
		$Game=$_POST['Game'];
		$CoachName=$_POST['CoachName'];
		$Grade=$_POST['Grade'];
		include 'connection.php';
		$q="INSERT INTO sports(AdmNo,Game,CoachName,Grade) VALUES(".$AdmNo.",'".$Game."','".$CoachName."','".$Grade."')";
		mysqli_query($con,$q) or exit("Error in query");
		echo "Record Added Successfully";
	}
	else
	{
		echo "Fill all Fields";
	}
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<label>AdmNo</label>
	<input type="text" name="AdmNo">
	<label>Game</label>
	<input type="text" name="Game">
	<label>CoachName</label>
	<input type="text" name="CoachName">
	<label>Grade</label>
	<input type="text" name="Grade">
	<input type="submit" name="">
</form>