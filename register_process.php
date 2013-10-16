<?php 
require_once('config.ini');
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$re_pass=$_POST['re_pass'];
$username=$_POST['username'];

$add="INSERT INTO user_login (username,password,name,email)VALUES ('$username','$pass','$name','$email')";

if (!mysql_query($add))
  {
  die('Error: ' );
  }
else {
header('Location:index.php');
	}






?>
