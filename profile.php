<?php
session_start();
require_once('config.ini');
if(!isset($_SESSION['login'])){
	header('Location:index.php');
}
?>
<html>
<link href="content/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="content/css/style.css" rel="stylesheet" type="text/css" />
<title>Devfest Chennai 2013 Hackathon</title>
<body>

<div id="wrap"> 

<div class="navbar navbar-default ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">DevFest Hackathon</a>
        </div>
         <form class="navbar-form navbar-left" role="search" action="search.php" method="get">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Go !</button>
    </form> 
        <div class="navbar-collapse collapse pull-right">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="submit.php">Submit</a></li>
            <li class="dropdown">
              <?php 
			  if(isset($_SESSION['login'])!=1){
				  echo '
				   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login/Register <b class="caret"></b></a>
              <ul class="dropdown-menu"><li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>'; 
			  }
			  
			  else{
				   echo"<a href='#' class='dropdown-toggle' data-toggle='dropdown'>{$_SESSION['member_name']} <b class='caret'></b></a>
              <ul class='dropdown-menu'>
			   <li><a href='profile.php'>Profile</a></li>
			  <li><a href='logout.php'>Logout</a></li>"; 
				  }
			  
			  ?>
               
              </ul>
            </li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
   <?php 
   
	   
	$username=$_SESSION['member_id'];
   $sql = "SELECT * FROM projects where username='$username' ";
   $result = mysql_query($sql);
   echo "<div class='row'>";

   while ( $db_field = mysql_fetch_assoc($result) ) {
	   
	echo "<div class='well col-lg-8 module_big'><h3><a href='search.php?id={$db_field['id']}'>{$db_field['name']}</a></h3> <p>{$db_field['author']}</p><p class='des'>{$db_field['description']}</p> <br> <br> <i>Tags:{$db_field['tags']}</i> <br><br><div class='btn-group'><a href={$db_field['path']} target='_blank' class=' btn btn-sm btn-primary'>Download</a></div> <br><br></div>";  

echo "<div class='well col-lg-3 module'><h3>The Author</h3> <p>{$db_field['author']}</p> <br><br></div>";  
}
   echo "</div>";
  
	
   ?>
   
    </div>
</div>
<div id="footer">
      <div class="container">
        <p class="footer_text">Designed By GDG Chennai Design Team.</p>
      </div>
    </div>
</body>
<script src="content/js/jquery.js"></script>
<script src="content/js/bootstrap.js"></script>
</html>