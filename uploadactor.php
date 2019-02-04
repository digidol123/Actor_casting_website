<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "  " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "  ";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "  ";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "  ";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "  ";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "  ";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Thank you for uploading your information  ";
    } else {
        echo "Sorry, there was an error  ";
    }
}

// Database
        $db = pg_connect('host=db.dcs.aber.ac.uk dbname=cs399030_16_17 user=shc29 password=fred'); 

        $email = pg_escape_string($_POST['email']); 
        $dob = pg_escape_string($_POST['dob']); 
        $first_name = pg_escape_string($_POST['first_name']); 
        $second_name = pg_escape_string($_POST['second_name']); 
        $gender = pg_escape_string($_POST['gender']); 
        $image = pg_escape_string(basename( $_FILES["image"]["name"])); 

        
        $query = "INSERT INTO actress (email, dob, first_name, second_name, gender, image) VALUES ('" . $email . "', '" . $dob . "','" . $first_name . "','" . $second_name . "','" . $gender . "','" . $image . "')";
        
        $result = pg_query($query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Please try again " . $errormessage; 
            exit(); 
        } 
        printf (" "); 
        pg_close(); 
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
