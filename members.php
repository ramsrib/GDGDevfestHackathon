<?php 
session_start();
	require_once('config.ini');
	 $sql = "SELECT * FROM user_login";
   $result = mysql_query($sql);
   $i=0;
   
      while ( $db_field = mysql_fetch_assoc($result) ) {
$i=$i+1;
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
            <li class="active"><a href="index.php">Home</a></li>
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
    <div class="well row ribbon">
      
    <div class=" pull-left ribbon  col-lg-9 well">
   <h4><?php echo $i ?> Participants</h4>
    </div>
    <div class="col-lg-3 pull-right ribbon">
     <div class="fb-like " data-href="http://www.zathrac.com/demo/hackathon/" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
    
    <div class="g-plusone" data-size="medium"  data-href="http://www.zathrac.com/demo/hackathon/"></div>

    
    </div>
    </div>
    
   <?php 
   $sql = "SELECT * FROM user_login";
   $result = mysql_query($sql);
   echo "<div class='row'>";

   while ( $db_field = mysql_fetch_assoc($result) ) {
	   
	echo "<div class='well col-lg-3 module_user'>
	<h4>
	{$db_field['name']}
	</h4>
	 
	<h5>{$db_field['username']}</h5>
	<h5><i>{$db_field['email']}</i></h5>
	</div>";  

}
   echo "</div>";
	
   ?>
    </div>
    
 

    
    
    </div>
</div>
<div id="footer">
      <div class="container">
        <p class="footer_text">Designed By GDG Chennai Design Team. </p>
       
      </div>
      
    </div>
</body>
<script src="content/js/jquery.js"></script>
<script src="content/js/bootstrap.js"></script>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=206978699480627";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 
</html>