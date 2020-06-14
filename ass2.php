<?php
$file1=fopen("Vis.txt","r");
if(!$file1)
{
	exit("Error in open");
}
$count=fgets($file1);
$count++;
echo $count;
fclose($file1);
$file1=fopen("Vis.txt","w");
fwrite($file1,$count);
fclose($file1);

?>