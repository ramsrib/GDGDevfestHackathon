<?php 
require_once('config.ini');
session_start();
$username =$_POST['username'];
$pass=$_POST['pass'];
$result=mysql_query("select * from user_login where username='$username' and password='$pass'");

if(($row=mysql_fetch_array($result))!=0)
{
$_SESSION['member_id']=$row['username'];
$_SESSION['member_name']=$row['name'];
$_SESSION['member_mail']=$row['email'];
$_SESSION['tname']=$row['tname'];
$_SESSION['login']=1;
header('Location:index.php');
}
else
{
$msg="access denied";
header('Location:login.php?msg=1');
}

mysql_close($con);
?>

?>