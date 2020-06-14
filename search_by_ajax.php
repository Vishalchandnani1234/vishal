<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="showall1.css">
	<title></title>
</head>
<body>
	<?php
	if(!empty($_GET['msg']))
	{
		echo "<h3>".$_GET['msg']."</h3>";
	}
	?>
	<a href="conform1.php"><input type="button" name="" value="Add"> </a><br><br>
	
		<input type="text" name="val" id="val" onkeyUp="f()"><br><br>
		<!-- <input type="button" value="Search" onClick="f()"> -->
	
	<div id="res"></div>
</body>
<script>
	f();
	function f()
	{
		val=document.getElementById('val').value;
		if(val.length==0)
		{
			v="get_data_for_ajax.php";			
		}	
		else
		{
			v="get_data_for_ajax.php?q=" + val
		}
		var xmlhttp = new XMLHttpRequest();
    	xmlhttp.onreadystatechange = function() 
    	{
        	if (this.readyState == 4 && this.status == 200) 
        	{
            	document.getElementById("res").innerHTML = this.responseText;
        	}
    	};
        xmlhttp.open("GET",v, true);
        xmlhttp.send();
	}
</script>