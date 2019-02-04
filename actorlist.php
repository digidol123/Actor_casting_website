

<?php
//error handling
		//ini_set('display_errors', 1);
		//ini_set('display_startup_errors', 1);
		//error_reporting(E_ALL);

?>
	
<?php
// Start the session
session_start();
if ($_SESSION["islogin"] == FALSE) {
    echo "incorrect password please log in first";
	header('Location: studentlogin.php');
}
?>
	

<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  

<link href="style.css" rel="stylesheet" type="text/css">
<title>Casting Aber</title>
	
  






</head>
<body>

<div class="header">

	<br />
	
	
	<a href="home.php" style="margin-top:-5px;">  <img src="casting_aber.jpg" class="style-logotitle" alt="casting aber"> </a>

	<br />
	<br />
	<div class="menu">
	<ul class="topnav">
	
		<li><a href="home.php">Home</a></li> 
		<li><a href="about.php">About</a></li> 
		<li><a href="logout.php">Log out</a></li> 
		
		
	
			
	</ul>
</div> 
</div> 
<br />
<br />
<br />


	<div class="main">		
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for an actor's name.." title="Type in a name">
  <input type="text" id="my2ndInput" onkeyup="my2ndFunction()" placeholder="Search for an actor's gender.." title="Type in a gender">

	<table id="myTable" border="0" cellspacing="0" cellpadding="0"> 
            <tr> 
                <td> 
                    id
                </td> 
                <td> 
                    Date of Birth
                </td> 
                <td> 
                    First Name 
                </td> 
                <td> 
                    Second Name 
                </td> 
                <td> 
                    Gender
                </td> 
                <td> 
                    Email
                </td> 
                <td> 
                    Headshot
                </td> 
            </tr> 
			
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</br>

<script>
function my2ndFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("my2ndInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
        <?php 
		

		
        $db = pg_connect('host=db.dcs.aber.ac.uk dbname=cs399030_16_17 user=shc29 password=fred'); 

        $query = "SELECT * FROM actress"; 

        $result = pg_query($query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 

        while($myrow = pg_fetch_assoc($result)) { 
            printf ("<tr><td>%s
            </td><td>%s
            </td><td>%s
            </td><td>%s
            </td><td>%s
            </td><td>%s
            </td><td>%s
            </td></tr>",

             $myrow['id'], htmlspecialchars($myrow['dob']), htmlspecialchars($myrow['first_name']), 
htmlspecialchars($myrow['second_name']),htmlspecialchars($myrow['gender']),htmlspecialchars($myrow['email']),  

//TODO: How to display image in table
             //htmlspecialchars($myrow['image']));
//'<img src="', $target_dir, '/', $myrow['image'], '" alt="', $myrow['image'], '"/>');
            '<img src="uploads/' . $myrow['image'] . '" height="73" width="70" alt= "' . $myrow['image'] . '"/>');
             //$target_dir = "uploads/";
             //echo '<img src="', $target_dir, '/', $myrow['image'], '" alt="', $myrow['image'], '"/>';
			 
        } 
        
        ?> 
        </table> 
	</div>



			

<br />
<br />
<br />
<br />





<div class="clearfix"></div>
<br />
</div>
<br />
<footer id="footer">
	<div class="inner">
	
<ul class="copyright">
								<li>&copy; Casting Aber. All rights reserved shc29@aber.ac.uk</li>
								<li>Design: <a href="https://uk.linkedin.com/in/jesse-chen-81617a125">Jesse Chen</a></li>
								<li> <a href="sitemap.php">Site map </a></li>
							</ul>
	
	
	
	
	
		



</footer>


</body>
</html>