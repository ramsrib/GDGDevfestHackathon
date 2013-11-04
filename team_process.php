<?php
require_once('config.ini');

if (isset($_GET['check'])) {
    $tname = $_POST['tname'];
    $check = "SELECT * FROM teams where tname= '$tname'";
    
    $res = mysql_query($check);
    
    if (mysql_num_rows($res) != 0) {
        echo $res['tname'];
    } else {
        echo 1;
    }
    
}


else {
    
    
    $tname = $_POST['tname'];
    $mem1  = $_POST['1mem'];
    $mem2  = $_POST['2mem'];
    $mem3  = $_POST['3mem'];
    $prop  = $_POST['prop'];
    
    $result_mem1 = mysql_query("select * from teams where 1mem='$mem1' or 1mem='$mem2' or 1mem='$mem3'");
    $result_mem2 = mysql_query("select * from teams where 2mem='$mem1' or 2mem='$mem2' or 2mem='$mem3'");
    $result_mem3 = mysql_query("select * from teams where 3mem='$mem1' or 3mem='$mem2' or 3mem='$mem3'");
    
    $row1 = @mysql_num_rows($result_mem1);
    $row2 = @mysql_num_rows($result_mem2);
    $row3 = @mysql_num_rows($result_mem3);

    
    
    
    
    if ($row1 == 0 and $row2 == 0 and $row3 == 0) {
        $result_p1 = mysql_query("select * from user_login where username='$mem1'");
        $result_p2 = mysql_query("select * from user_login where username='$mem2'");
        $result_p3 = mysql_query("select * from user_login where username='$mem3'");
        $row_p1    = @mysql_num_rows($result_p1);
        $row_p2    = @mysql_num_rows($result_p2);
        $row_p3    = @mysql_num_rows($result_p3);
		
	if ($mem1 == NULL) {
       $row_p1= 2;
    }
    if ($mem2 == NULL) {
        $row_p2= 2;
    }
    if ($mem3 == NULL) {
        $row_p3= 2;
    }
        if ($row_p1 == 0 or $row_p2 == 0 or $row_p3 == 0) {
            
            if ($row_p2 == 0) {
                echo "Member 2 Not Yet Regsitered";
                echo "<br><a href='team.php'>Go Back</a>";
            }
            if ($row_p3 == 0) {
                echo "Member 3 Not Yet Regsitered";
                echo "<br><a href='team.php'>Go Back</a>";
            }
            
        } else {
            $add        = "INSERT INTO teams (tname,1mem,2mem,3mem,prop)VALUES ('$tname','$mem1','$mem2','$mem3','$prop')";
            $add_tomem1 = "UPDATE user_login SET tname='$tname' WHERE username='$mem1';";
            $add_tomem2 = "UPDATE user_login SET tname='$tname' WHERE username='$mem2';";
            $add_tomem3 = "UPDATE user_login SET tname='$tname' WHERE username='$mem3';";
            if (!mysql_query($add)) {
                die('Error:');
            }
            
            else {
                echo "success";
                mysql_query($add_tomem1);
                mysql_query($add_tomem2);
                mysql_query($add_tomem3);
                $_SESSION['tname'] = $tname;
                echo "<br><a href='team.php'>Go Back To Team</a>";
            }
            
            
        }
        
    } else {
        
        
        if ($row1 == 1) {
            echo "1st Member is already in another team";
            
        }
        
        elseif ($row2 == 1) {
            echo "2nd Member is already in another team";
            
        } elseif ($row3 == 1) {
            echo "3rd Member is already in another team";
            
        }
        echo "<br><a href='team.php'>Go Back</a>";
    }
    
}


?>
