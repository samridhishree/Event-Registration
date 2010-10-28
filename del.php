<?php
require_once('authorize.php') ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Gravitas - Event Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
   <div id="allcontent">
  <img src="images/gravitas.png" alt="Gravitas 2010 Logo" id="logo" />
  <h3 id="page_title">Gravitas - Delete Registration</h3>
  
  <?php
    //connecting to database
   $dbc = mysqli_connect('localhost', 'root', '', 'gravitas1') or die("Error connecting to the database");
    
	$t_id= $_GET['t_id'];
	$col_name = $_GET['col_name'] ;
	
	
	//deleting from the table
	
	  $query= "DELETE FROM team WHERE t_id = '$t_id'";
	  $data= mysqli_query($dbc,$query) or die('Error deleting from the database');
	  
	  echo '<p id="delete_page">Registration of team from ' . $col_name . ' has been deleted.</p>';
	  echo '<a href="index.php" class="links" id="delete_to_create">Create new registration</a>' ;
	?>
<div id="footer">
<p>&copy; 2010 Designed and developed by <a href="http://www.samridhishree.com" class="devs">Samridhi Shree</a> and <a href="http://www.rohitmishra.me" class="devs">Rohit Mishra</a>
</div>
</body>
</html>