<?php
	if(isset($_GET['t1']))
	{
		echo $_GET['t1'];
	}
	if(isset($_GET['t2']))
	{
		echo $_GET['t2'];
	}
?>
<form>
	<input type="text" name="t1">
	<input type="text" name="t2">
	<input type="submit">
</form>