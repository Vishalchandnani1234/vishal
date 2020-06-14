<?php
if(isset($_REQUEST['t1']))
{
	echo $_REQUEST['t1'];
}
if(isset($_REQUEST['t2']))
{
	echo $_REQUEST['t2'];
}
?>
<form>
	<input type="text" name="t1">
	<input type="text" name="t2">
	<input type="submit">
</form>