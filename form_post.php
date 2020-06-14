<?php
$error1=$error2="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(!empty($_POST['t1']))
	{
		echo $_POST['t1'];
	}
	else
	{
		$error1="Feild Cant be left blank";
	}
	if(!empty($_POST['t2']))
	{
		echo $_POST['t2'];
	}
	else
	{
 		$error2="Feild Cant be left blank";
	}
}
?>
<style type="text/css">
.error
{
	color:red;
}
</style>
<?php 
	include_once('header.php');
	include_once('header.php');
	echo $a;
	echo $a;
	echo $a;
	echo $a;
 ?>
<form method="post">
	<input type="text" required name="t1">
	<span class="error"><?php echo $error1; ?></span>
	<input required type="text" name="t2" >
	<span class="error"><?php echo $error2; ?></span>
	<input type="submit">
</form>