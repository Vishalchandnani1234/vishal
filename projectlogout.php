<?php
	session_start();
	session_destroy();
	header('location:project1.php?msg=Logged Out Successfully');
?>