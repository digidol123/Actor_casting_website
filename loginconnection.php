<?php
// Start the session
session_start();

 $db = pg_connect('host=db.dcs.aber.ac.uk dbname=cs399030_16_17 user=shc29 password=fred'); 
 $username = pg_escape_string($_POST['username']); 
 $password = pg_escape_string($_POST['password']);
 $query = "SELECT * FROM student WHERE username = '" . $username . "' AND password = '" . $password . "'";
        
        $result = pg_query($db,$query); 
        
		
		if (pg_fetch_row($result)) {
			
			
			// Set session variables
$_SESSION["islogin"] = true;


			
			echo "Welcome back to Casting Aber " ;
			header('Location: actorlist.php');
			}
			
			else { // !$result 
            $errormessage = pg_last_error(); 
            echo "Incorrect username or password " . $errormessage; 
            exit(); 
        } 
		
			
			pg_close(); 
		
?> 