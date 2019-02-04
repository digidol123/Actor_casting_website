<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = ''; 
    $to = ''; 
    $subject = '';
    $human = $_POST[''];
			
    $body = "From: $name\n E-Mail: $email\n Message:\n $message";
				
    if ($_POST['submit'] && $human == '4') {				 
        if (mail ($to, $subject, $body, $from)) { 
	    echo '<p>Your message has been sent!</p>';
	} else { 
	    echo '<p>Something went wrong, go back and try again!</p>'; 
	} 
    } else if ($_POST['submit'] && $human != '4') {
	echo '<p>Thank you! Your message has been sent!</p>';
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  

<link href="style.css" rel="stylesheet" type="text/css">
<title>Casting Aber</title>
    
<p>If you wish to go to the home page, Please <a href="home.php">click here</a>.</p>


</body>
</html>