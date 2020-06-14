<?php
session_start();
if($_POST['submit'])
{
	if($_SESSION['Vis'])
	{
		$vis=$_FILES["file"]["name"];
		$type=$_FILES["file"]["type"];
		$size=$_FILES["file"]["size"];
		$tempname=$_FILES["file"]["tmp_name"];
		$error=$_FILES["file"]["error"];
		if($type=="image/jpeg" || $type=="image/png")
		{
			if($size>10000 && $size<50000)
			{
				if($error>0)
				{
					echo "Error.....";
				}
				else
				{
					if(file_exists("upload/".$vis))
					{
						echo $vis."  already exists";
						header("location:search_by_ajax.php?msg=".$vis."  already exists");
					}
					else
					{
						$num="upload/".$vis;
						move_uploaded_file($tempname,$num);
						echo "<a href='$num'>Click to view image</a>";
					}
				}
			}
			else
			{
				echo "Size is exceed";
				header("location:search_by_ajax.php?msg=Size is exceed");
			}
		}
		else
		{
			echo "Image File does not match criteria";
			header("location:search_by_ajax.php?msg=Image File does not match criteria");
		}
	}
	else
	{
		echo "start the session";
	}
}
?>