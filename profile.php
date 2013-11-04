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
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="index.php">DevFest Hackathon</a> </div>
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
            <li><a href="team.php">Team</a></li>
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
      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
  <div class="container">
    <?php 
    if(isset($_GET['me']))
   {
	   
	$username=$_SESSION['member_id'];
   $sql = "SELECT * FROM user_login where username='$username' ";
   $result = mysql_query($sql);
   echo "<div class='row'>";

   while ( $db_field = mysql_fetch_assoc($result) ) {
	   
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
	";  
	

}
	echo"<div class=' col-lg-4 module_big'>
	
<div class='panel panel-info'>
  <div class='panel-heading'>Projects</div>

	<div class='list-group'>";
   $sql = "SELECT * FROM projects where username='$username' ";
   $result_project = mysql_query($sql);
   
   while ( $db_projects = mysql_fetch_assoc($result_project) )
    {

echo "
 
   <a class='list-group-item' href='search.php?id={$db_projects['id']}'>
   
   <h4 class='list-group-item-heading'>{$db_projects['name']}</h4><br>
     <p class='list-group-item-text pull-left''>


  	 <div class='fb-like ' data-href='http://www.zathrac.com/demo/hackathon/search.php?id={$db_field['id']}' data-width='The pixel width of the plugin' data-height='The pixel height of the plugin' data-colorscheme='light' data-layout='button_count' data-action='like' data-show-faces='true' data-send='false'></div>
	  <div class='g-plusone ' data-size='medium' data-href='http://www.zathrac.com/demo/hackathon/search.php?id={$db_field['id']}'></div>
	 
  </p></a>
  

  
";
   }
   echo "</div></div></div></div></div>";
  
   }
   ?>
 
  </div> </div> </div>
 <?php 
			  if(isset($_SESSION['login'])){
				  echo "
    <div id='shoutbox'>
   
    <div id='chat'>
	 <div class='chathead' id='chathead'>Chat With Other Participants</div>
     <div id='shouts'>
     
	<ul>
	 </ul>
	 </div>
	 <div id='write'>
     <form class='form-inline' role='form'>
     
     
    <div class='input-group'>
 <input  type='text' class='form-control' id='shout_message' placeholder='Message' name='message'>      <span class='input-group-btn'>
  <input type='hidden' id='shout_name' name='name' value='{$_SESSION['member_name']} '>

 <button  type='submit' class='btn btn-group-xs'  id='shout_button' type='button' value='Send'>Send</button>
      </span>
    </div><!-- /input-group -->
</div><!-- /.row -->
	  
      
       </form>
	 </div>
     <div class='chathead' style='position:fixed;bottom:0' id='chathead_bottom'>Chat Room</div>
   </div>
   
   
   </div>
   
</div>";
			  }
?>
<div id="footer">
  <div class="container">
    <p class="footer_text">Designed By GDG Chennai Design Team.</p>
  </div>

</body>
<script src="content/js/jquery.js"></script>
<script src="content/js/bootstrap.js"></script>
<script src="content/js/script.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=206978699480627";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</html>
