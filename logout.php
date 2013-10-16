<?php
  session_start();

  // Destroy the sessions
  // If you have more sessions, add more like below, but replace email if it is different:
  // unset($_SESSION['session_name']);

    unset($_SESSION['login']);
	unset($_SESSION['member_id']);
	unset($_SESSION['member_name']);
	unset($_SESSION['member_mail']);
				  
  header("Location: index.php");

?>
