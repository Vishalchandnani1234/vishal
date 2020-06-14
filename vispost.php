<?php
$error1=$error2="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(empty($_REQUEST['25']))
	{
		$error1="Column Can't be blanked";
	}
	else
	{
		echo $_REQUEST['25'];
	}	
	if(empty($_REQUEST['yoyo']))
	{
		$error2="Column Can't be blanked";
	}
	else
	{
		echo $_REQUEST['yoyo'];
	}
}	
?>

<form method="post">
	<input type="text" name="25">
	<span style="color: red"><?php echo $error1; ?></span>
	<input type="text" name="yoyo">
	<span style="color: red"><?php echo $error2; ?></span>
	<input type="submit">
</form>
<?php
$str = "Who's Peter Griffin?";
echo $str . " This is not safe in a database query.<br>";
echo addslashes($str) . " This is safe in a database query."."<br>";
?>
<?php
echo addcslashes("Hello",'H')."<br>";
echo addcslashes("VISHAL",'A..V')."<br>";
echo addslashes('VISHAL "CHANDNANI')."<br>";
echo chop("VISHAL\n\n")."<br>";
echo htmlentities("v?dd??sa??")."<br>";
$str="Hello world. It's a beautiful day";
print_r (explode(".",$str,0));
echo "<br>";
print_r(explode(".",$str,-1));
echo "<br>";
//print_r(explode(".",$str,2));
echo "<br>";
$str1="This is <b>bold</b> text";
echo htmlspecialchars($str1);
echo "<br>";
$str2=array('Hello', 'Friends', 'lets', 'play');
echo implode(" ",$str2);
echo "<br>";
$str3=array("Yellow","Blue","Green","Yellow");
print_r(str_ireplace("Yellow","Vishal",$str3,$v));
echo $v;
echo "<br>";
echo stripcslashes("Hello\World");
echo "<br>";
echo strip_tags("Hello <b>World</b>");
echo "<br>";
$str4="Hello World.Hello World.Hello World";
echo stripos($str4,"Hello",2);
echo "<br>";
echo strrev("madam");
echo "<br>";
echo strstr($str4,"World");
echo "<br>";
echo strtolower("HELLO WORLD");
echo "<br>";
echo substr("Hello Vishal",6,9);
echo "<br>";
echo substr_compare($str4,"Hello World.Hello World.Hello World",0,20);
echo "<br>";
echo substr_compare("world","or",1,2);
echo "<br>";
echo substr_count($str4,"Hello",6,25);
echo "<br>";
echo substr_replace($str4,"Vishal",6);
echo "<br>";
echo wordwrap($str4,15,"<br>");
?>
