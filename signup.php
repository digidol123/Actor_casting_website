<?php 
        $db = pg_connect('host=db.dcs.aber.ac.uk dbname=cs399030_16_17 user=shc29 password=fred'); 

        $username = pg_escape_string($_POST['username']); 
        $password = pg_escape_string($_POST['password']); 
        
        $query = "INSERT INTO student(username, password) VALUES('" . $username . "', '" . $password . "')";
        
		$result = pg_query($query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        printf ("thank you for registering "); 
		
		
        pg_close(); 
        ?> 