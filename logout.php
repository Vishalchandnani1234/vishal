<?php
session_start();
session_destroy();
header('location:login.php?msg=Log out Successfully');
?>