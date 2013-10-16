<?php
session_start();
if(isset($_SESSION['login'])!=1){
	header('Location:login.php?msg=2');
}
?>
<html>
<link href="content/css/bootstrap.css" rel="stylesheet" type="text/css" />
<title>Devfest Chennai 2013 Hackathon</title>
<body>
	
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
            <li ><a href="about.php">About</a></li>
            <li class="active"><a href="submit.php">Submit</a></li>
            <li class="dropdown">
              <?php 
			  if(isset($_SESSION['login'])!=1){
				  echo '
				   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign In <b class="caret"></b></a>
              <ul class="dropdown-menu"><li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>'; 
			  }
			  
			  else{
				   echo"<a href='#' class='dropdown-toggle' data-toggle='dropdown'>{$_SESSION['member_name']} <b class='caret'></b></a>
              <ul class='dropdown-menu'> <li><a href='profile.php'>Profile</a></li><li><a href='logout.php'>Logout</a></li>"; 
				  }
			  
			  ?>
              </ul>
            </li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
    <div class="col-lg-4 pull-left">
    <form action="upload_file.php" method="post" id="frm1"
enctype="multipart/form-data">
<label for="Name">Project Name:</label>
<input type="text" name="name" class="form-control"  required/><br>
<label for="description">Project Description:</label>
<textarea name="description" class="form-control" required></textarea><br>
<label for="tag">Tags:</label>
<input type="text" name="tag" class="form-control" required/><br>
<label for="file">File:</label>
<input type="file" name="file" id="file" required><br>
<input type="submit" name="submit" value="Submit" class="btn btn-primary">
<input type="button" name="clear" value="Clear" class="btn btn-danger" onClick="formReset()">
</form>
</div>
    </div>

</body>
<script src="content/js/jquery.js"></script>
<script src="content/js/bootstrap.js"></script>
<script src="content/js/jqBootstrapValidation.js"></script>

<script>
function formReset()
{
document.getElementById("frm1").reset();
}
</script>
</html>