<?php
session_start();
if(!isset($_SESSION['customer_email']))
{
	include 'Projectlogin.php';
}
else
{
	include 'payment.php';
}
?>