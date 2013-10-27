<?php
session_start();
if(isset($_SESSION['login'])){
	header('Location:index.php');
}
?>
<html>
<link href="content/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="content/css/style.css" rel="stylesheet" type="text/css" />
<title>Devfest Chennai 2013 Hackathon</title>
<body>
<?php 
	require_once('config.ini');
?>
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
            <li class=""><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li><li><a href="members.php">Participants</a></li>
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
			   <li><a href='profile.php?me'>Profile</a></li>
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
    <div class=" col-lg-8 pull-left" >
<div style="padding-top:100; width:500px;">
<img src="content/img/login.png">
<h3>One password. All of Google.</h3>

<p>Want to enjoy the best of Google? Just stay signed in. One username and password is all you need to unlock more features from services you use every day, like Gmail, Maps, Google+, and YouTube.</p>
</div>
 </div>

 <div class="well col-lg-3  pull-right" >

<form method="post" action="login_process.php"><br>
<label for="username">Username:</label> <input type="text" name="username"class="form-control"><br>
<label for="pass">Password:</label> <input type="password" name="pass"class="form-control"><br>
   <?php 
if(isset($_GET['msg']))
{
	$message=$_GET['msg'];
	if($message==1)
	echo "<p ><i style='color:red'>Wrong Username/Password</i><p><br/>";
	if($message==2)
	echo "<p ><i style='color:red'>Please login First</i><p><br/>";
}

?>
<input type="submit" name="submit" class="btn btn-primary">
</form>
 </div>
 
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