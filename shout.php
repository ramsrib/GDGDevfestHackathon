<?php
  @$mysqli = new mysqli("localhost", "root", "", "gdg_hackathon");
if(isset($_POST['name'],$_POST['msg'])){
  $name = trim($_POST['name']);
    $url = trim($_POST['url']);
  $msg = trim($_POST['msg']);
  if(!empty($name)&&!empty($msg)){
      $sql = "INSERT INTO `shouts` (`id`,`name`,`message`,`post_date`) VALUES(NULL,'".mysql_real_escape_string($name)."','".mysql_real_escape_string($msg)."',NOW())";
	  $mysqli->query($sql);
  }
}

if(isset($_GET['show'])){

 $sql = "SELECT `name`,`message`,`post_date` FROM shouts ORDER BY `id` DESC";
 if($result = @$mysqli->query($sql)){
 while($row = $result->fetch_assoc()){
    echo "<li><span class='shout_post_name'>".$row['name']."</span>:".$row['message']."</li>";
  }
 }
} 
?>