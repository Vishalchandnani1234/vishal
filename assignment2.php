<?php

$file=fopen("Vishal.txt","r");
if(!$file)
{
	exit("Error in open");
}
$count=fgets($file);
$count++;
echo $count;
fclose($file);
$file=fopen("Vishal.txt","w");
fwrite($file,$count);
//echo fgets($file);
fclose($file);
?>