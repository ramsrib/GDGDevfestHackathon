<?php 
session_start();
require_once('config.ini');
if(!isset($_SESSION['login'])){
	header('Location:login.php?msg=2');
	
	
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
            <li ><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
             <li><a href="members.php">Participants</a></li>
        <li class="active"><a href="team.php">Team</a></li>
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
              <ul class='dropdown-menu'><li><a href='profile.php?me'>Profile</a></li><li><a href='logout.php'>Logout</a></li>"; 
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
   $uname=$_SESSION['member_id'];

  $check="SELECT * FROM teams where 1mem= '$uname' or 2mem = '$uname' or 3mem = '$uname' " ;

$result = mysql_num_rows(mysql_query($check)); 


if($result==0 )
{
	
	echo "  <div class='well col-lg-3'>
<form method='post' action='team_process.php'><br>
<label for='username'>Team Name:</label> 
<input type='text' minlength='6'  maxlength='15' name='tname' id='tname' class='form-control' required><br>
 

 <input type='button' class='btn btn-success' id='check_username_availability' value='Check Availability'><div id='username_availability_result'></div>  <br>
<label for='name'>1st Member:</label> <input type='text' name='1mem' class='form-control' value='{$_SESSION['member_id']}'  readonly  /><br>
<label for='name'>2nd Member:</label> <input type='text' name='2mem' class='form-control' required><br>
<label for='name'>3rd Member:</label> <input type='text' name='3mem' class='form-control' ><br>

	

<label for='prop'>Project Proposal:</label> <textarea class='form-control' name='prop'  ></textarea><br>
<input type='submit' name='submit' class='btn btn-primary'>
<p class='help-block'></p>
</form>
";
   
}
else{
	 if ( ($db_field = mysql_fetch_assoc(mysql_query($check)))!=0 ) {
	$mem1=$db_field['1mem'];
	$mem2=$db_field['2mem'];
	$mem3=$db_field['3mem'];

	   echo "<center><h1>Team {$db_field['tname']}</h1>
	   <h3><i>{$db_field['prop']}</i></h3><br>
	   </center>";
  
	
	     $sql = "SELECT * FROM user_login where username='$mem1' ";
   $result = mysql_query($sql);
   echo "<div class='row'>";

   while ( $db_field = @mysql_fetch_assoc($result) ) {
	   
	echo "<div class=' col-lg-7 module_big'>
<div class='panel panel-info'>
  <div class='panel-heading'>About {$db_field['name']}</div>
  <div class='panel-body'>
    <h3>Name: {$db_field['name']}</h3>
	<h3>Username: {$db_field['username']}</h3>
	<h3>Email: {$db_field['email']}</h3>
  </div>
	
	</div>
		
	</div></div>
	";  
   }
   
    $sql = "SELECT * FROM user_login where username='$mem2' ";
   $result = mysql_query($sql);
   echo "<div class='row'>";

   while ( $db_field = @mysql_fetch_assoc($result) ) {
	   
	echo "<div class=' col-lg-7 module_big'>
<div class='panel panel-info'>
  <div class='panel-heading'>About {$db_field['name']}</div>
  <div class='panel-body'>
    <h3>Name: {$db_field['name']}</h3>
	<h3>Username: {$db_field['username']}</h3>
	<h3>Email: {$db_field['email']}</h3>
  </div>
	
	</div>
		</div>
	</div>
	";  
   }
    $sql = "SELECT * FROM user_login where username='$mem3' ";
   $result = mysql_query($sql);
   echo "<div class='row'>";

   while ( $db_field = @mysql_fetch_assoc($result) ) {
	   
	echo "<div class=' col-lg-7 module_big'>
<div class='panel panel-info'>
  <div class='panel-heading'>About {$db_field['name']}</div>
  <div class='panel-body'>
    <h3>Name: {$db_field['name']}</h3>
	<h3>Username: {$db_field['username']}</h3>
	<h3>Email: {$db_field['email']}</h3>
  </div>
	
	</div>
		</div>
	</div>
	";  
   }
   
	 
   
	 }
}
?>
 </div>

    </div></div>
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
            if($('#tname').val().length < min_chars){  
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
        var tname = $('#tname').val();  
  
        //use ajax to run the check  
        $.post("team_process.php?check", { tname: tname },  
            function(result){  
                //if the result is 1  
                if(result == 1){  
                    //show that the username is available  
                    $('#username_availability_result').html(tname + ' is Available');  
                }else{  
                    //show that the username is NOT available  
                    $('#username_availability_result').html(tname + ' is not Available');  
                }  
        });  
  
}  


</script>
</html>