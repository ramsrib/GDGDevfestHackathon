<?php
session_start();
require_once('config.ini');
$name = $_POST['name'];
$description = $_POST['description'];
$tag = $_POST['tag'];
if (file_exists("uploads/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploads/" . $_FILES["file"]["name"]);
	  
      
	  $path="uploads/" . $_FILES["file"]["name"];
	  $author=$_SESSION['member_name'];
	  $username=$_SESSION['member_id'];
	  $sql="INSERT INTO projects (name, description, tags, path,author,username) VALUES
('$name', '$description', '$tag', '$path','$author','$username' )";
mysql_query($sql);

header('Location:'.'index.php');
     }

    
?>
</body>
</html>