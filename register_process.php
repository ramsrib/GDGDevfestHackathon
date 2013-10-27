<?php 
require_once('config.ini');

 if(isset($_GET['check']))
   {
	   $uname=$_POST['username'];
	   $check="SELECT * FROM user_login where username= '$uname'" ;

$res = mysql_query($check); 
if (mysql_num_rows($res) !=0) { 
echo $res['username'];
} 
else {
echo 1;
} 

   }
else
{
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$re_pass=$_POST['re_pass'];
$username=$_POST['username'];
$cat=$_POST['cat'];

$add="INSERT INTO user_login (username,password,name,email,category)VALUES ('$username','$pass','$name','$email','$cat')";
$uname_chk=mysql_query("select * from user_login where username='$username' ");

if (mysql_num_rows($uname_chk)==0)
 { 

if (!mysql_query($add))
  {
  die('Error: ' );
  }
  
else {
header('Location:index.php');
	}

}

else {
	header('Location:register.php?msg=1');
	}

}


?>
