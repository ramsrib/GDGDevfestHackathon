<?php 
session_start();
	require_once('config.ini');
	 $sql = "SELECT * FROM projects";
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
            <li><a href="members.php">Participants</a></li>
            <li><a href="team.php">Team</a></li>
            <li><a href="submit.php">Submit</a></li>
            
            <li class="dropdown">
             
              <?php 
			  if(isset($_SESSION['login'])!=1){
				  echo '
				   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login/Register <b class="caret"></b></a>
              <ul class="dropdown-menu">
			  
			
			  <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>'; 
			  }
			  
			  else{
				   echo"<a href='#' class='dropdown-toggle' data-toggle='dropdown'>{$_SESSION['member_name']} <b class='caret'></b></a>
              <ul class='dropdown-menu'> <li><a href='profile.php?me'>Profile</a></li><li><a href='logout.php'>Logout</a></li>"; 
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
   <h4>Total Submissions (<?php echo $i ?>)</h4>
    </div>
    <div class="col-lg-3 pull-right ribbon">
     <div class="fb-like " data-href="http://www.zathrac.com/demo/hackathon/" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
    
    <div class="g-plusone" data-size="medium"  data-href="http://www.zathrac.com/demo/hackathon/"></div>

    
    </div>
    </div>
    
   <?php 
   $sql = "SELECT * FROM projects";
   $result = mysql_query($sql);
   echo "<div class='row'>";

   while ( $db_field = mysql_fetch_assoc($result) ) {
	   
	echo "<div class='well col-lg-3 module'>
	<h4>
	<a href='search.php?id={$db_field['id']}'>{$db_field['name']}</a>
	</h4> 
	<p>By: <a href='search.php?author={$db_field['username']}'>{$db_field['author']}</a></p>
	<p class='des'>{$db_field['description']}</p> 
	<br> 
	<i>Tags:{$db_field['tags']}</i>
	 <br><br>
	 <a href={$db_field['path']} target='_blank' class='btn btn-xs btn-primary download'>Download</a> &nbsp;
	<hr>
	
	 <div class='fb-like ' data-href='http://www.zathrac.com/demo/hackathon/search.php?id={$db_field['id']}' data-width='The pixel width of the plugin' data-height='The pixel height of the plugin' data-colorscheme='light' data-layout='button_count' data-action='like' data-show-faces='true' data-send='false'></div>
	 
	<div class='g-plusone' data-size='medium' data-href='http://www.zathrac.com/demo/hackathon/search.php?id={$db_field['id']}'></div>
	

    
	 
	 <br><br></div>";  

}
   echo "</div>";
	
   ?>
    </div>
  </div>
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
        <p class="footer_text">Designed By GDG Chennai Design Team. </p>
       
      </div>
      
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