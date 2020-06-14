<?php
$error1=$error2=$error3="";
$name1=$name2=$name3=array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$p=0;
	if(empty($_POST['v1']))
	{	
		$error1="Column cant be blanked";
		$p=1;

	}	
	else
	{
		//if(!preg_match("/^[a-zA-Z]*$/",$name1))
		//{
		//	$error1="Only Letters are allowed";
		//}
		$name1=$_POST['v1'];
	}
	if(empty($_POST['v2']))
	{
		$p=1;
		$error2="Column cant be blanked";
	}
	else
	{
		$name2=$_POST['v2'];
	}
	if(empty($_POST['v3']))
	{
		$p=1;
		$error3="Column cant be blanked";
	}
	else
	{
		$name3=$_POST['v3'];
	}
	if($p==0)
	{
		echo "Number of Count = ". substr_count($name1,$name2,0);
		echo "<br>";
		echo "<br>";
	//	echo "Indexes in which we find string = ". strpos($name1,$name2);
		echo "Indexes in which we find string = ";
		$i=0;
		while(strpos($name1,$name2,$i)!="")
		{
			$p=strpos($name1,$name2,$i);
			$i=$p+1;
			echo "<br>".$i;
		}
		echo "<br>";
		echo "<br>";
		echo "After Replacement = ".str_ireplace($name2,"<span style=\"color:red;\">".$name3."</span>",$name1);
		echo "<br>";
		echo "<br>";
	}
}
?>
<form method="post">
	<label>Enter a String :</label>
	<input style="margin-left: 120px;"type="text" name="v1"><span><?php echo $error1; ?></span><br><br>
	<label >Enter a String to find index :</label>
	<input type="text" name="v2" style="margin-left: 35px"><span><?php echo $error2; ?></span><br><br>
	<label>Enter a String or word to replace :</label>
	<input type="text" name="v3"><span><?php echo $error3; ?></span><br><br>
	<input type="submit" name="">
</form>