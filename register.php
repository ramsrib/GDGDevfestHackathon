<?php
session_start();
if(isset($_SESSION['login'])){
	header('Location:index.php');
	
	require_once('config.ini');
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
          <a class="navbar-brand" href="#">DevFest Hackathon</a>
        </div>
         <form class="navbar-form navbar-left" role="search" action="search.php" method="get">
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Go !</button>
    </form> 
        <div class="navbar-collapse collapse pull-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="submit.php">Submit</a></li>
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
              <ul class='dropdown-menu'><li><a href='logout.php'>Logout</a></li>"; 
				  }
			  
			  ?>
              </ul>
            </li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
   <div class="well col-lg-3 " >
<form method="post" action="register_process.php"><br>
<label for="username">Username:</label> 
<input type="text" minlength="6"  maxlength="15" name="username" id="username" class="form-control" required><br>
   <?php 
if(isset($_GET['msg']))
{
	$message=$_GET['msg'];
	if($message==1)
	echo "<p id='unuser' ><i style='color:red'>Username Unavailable</i><p>";
	if($message==2)
	echo "<p ><i style='color:red'>Please login First</i><p><br/>";
}

?>
 <input type='button' class="btn btn-success" id='check_username_availability' value='Check Availability'><div id='username_availability_result'></div>  <br>
<label for="name">Full Name:</label> <input type="text" name="name"class="form-control" required><br>
<label for="email">Email:</label> <input type="email" name="email"class="form-control" required><br>

<label for="cat">Category:</label> 
<select class="form-control" name='cat' id="cat" required><br>
<option value="Developer">Developer</option>
<option value="Designer">Designer</option>
<option  value="Hacker">Hacker</option>

</select><br>

<label for="pass">Password:</label> <input type="password" name="pass"class="form-control" required><br>
<label for="re_pass">Retype Password:</label> <input type="password" name="re_pass"class="form-control" data-validation-matches-match="pass" 
  data-validation-matches-message=
    "Must match email address entered above" ><br>
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
<script src="content/js/script.js"></script>

<script src="content/js/jqBootstrapValidation.js"></script>
<script>
  $(function () { $("input,select,textarea,password").not("[type=submit]").jqBootstrapValidation(); } );
  
  
  //the min chars for username  
        var min_chars = 3;  
  
        //result texts  
        var characters_error = 'Minimum amount of chars is 3';  
        var checking_html = 'Checking...';  
  
        //when button is clicked  
        $('#check_username_availability').click(function(){  
            //run the character number check  
            if($('#username').val().length < min_chars){  
                //if it's bellow the minimum show characters_error text '  
                $('#username_availability_result').html(characters_error);  
            }else{  
                //else show the cheking_text and run the function to check  
                $('#username_availability_result').html(checking_html);  
                check_availability();  
            }  
			$("#unuser").hide();
        });  
  
  //function to check username availability  
function check_availability(){  
  
        //get the username  
        var username = $('#username').val();  
  
        //use ajax to run the check  
        $.post("register_process.php?check", { username: username },  
            function(result){  
                //if the result is 1  
                if(result == 1){  
                    //show that the username is available  
                    $('#username_availability_result').html(username + ' is Available');  
                }else{  
                    //show that the username is NOT available  
                    $('#username_availability_result').html(username + ' is not Available');  
                }  
        });  
  
}  


</script>
</html>