<?php
  @$mysqli = new mysqli("203.124.112.183", "zath", "ZathraC@1122", "zath");
if(isset($_POST['name'],$_POST['msg'])){
$con=mysql_connect('203.124.112.183','zath','ZathraC@1122');
mysql_select_db("zath",$con);
  $name = trim($_POST['name']);
    $url = trim($_POST['url']);
  $msg = trim($_POST['msg']);
  if(!empty($name)&&!empty($msg)){
   $add="INSERT INTO shouts (name,message,post_date)VALUES ('$name','$msg',now())";

	  mysql_query($add);
  }
}

if(isset($_GET['show'])){

 $sql = "SELECT `name`,`message`,`post_date` FROM shouts ORDER BY `id` DESC";
 if($result = $mysqli->query($sql)){
 while($row = $result->fetch_assoc()){
    echo "<li><span class='shout_post_name'>".$row['name']."</span>:".$row['message']."</li>";
  }
 }
} 
?>