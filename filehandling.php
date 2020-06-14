<?php
if(!empty($_GET['name']))
{
	$file=fopen("kt.txt", "a");
	if(!$file)
	{
		exit('Error in Open');
	}
	fwrite($file, "<b>".$_GET['name']."</b>");
	fclose($file);
	$file=fopen("kt.txt","r");
	echo fgets($file);
}
?>
<form>
	<input type="text" name="name">
	<input type="submit">
</form>