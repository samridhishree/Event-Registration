<?php
require_once('authorize.php') ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Gravitas - Admin Page</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <div id="allcontent">
  <img src="images/gravitas.png" alt="Gravitas 2010 Logo" id="logo" />
  <h3 id="page_title">Gravitas - Registration Admin Page</h3>

<?php
   //connecting to database
    $dbc = mysqli_connect('localhost', 'root', '', 'gravitas1') or die("Error connecting to the database");
	

	echo '<h3 class="subtitle">See Details By</h3> ' ;
	echo '<a href="admin_event.php" class="admin_links">Event</a>' ;
	echo '<a href="admin_college.php" class="admin_links">College</a>' ;
	echo '<a href="admin_date.php" class="admin_links">Date</a>' ;
	
	$query = "Select sum(p_male) AS sum from team" ; 
	$data = mysqli_query($dbc, $query) or die('Error finding total number of male participants.') ;
	$row = mysqli_fetch_array($data) ;
	$total_male_p = $row['sum'] ;
	
	$query = "Select sum(p_female) AS sum from team" ; 
	$data = mysqli_query($dbc, $query) or die('Error finding total number of female participants.') ;
	$row = mysqli_fetch_array($data) ;
	$total_female_p = $row['sum'] ;
	
	$total_p = $total_male_p + $total_female_p ;
	
	$query = "Select sum(total) AS sum from payment" ; 
	$data = mysqli_query($dbc, $query) or die('Error finding total amount.') ;
	$row = mysqli_fetch_array($data) ;
	$total_amnt = $row['sum'] ;
	
	
	echo '<h3 class="subtitle">Event Registration Highlights</h3>' ;
	echo '<p id="admin_details">' ;
	echo 'Total number of participants: ' . $total_p . '<br />';
	echo 'Total number of female participants: ' .$total_female_p . '<br />';
	echo 'Total number of male participants: ' . $total_male_p . '<br />';
	echo 'Total money collected :Rs ' . $total_amnt ; 
	echo '</p>' ;
	
	require_once('footer.php');
?>
</div>
</body>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
   
   
   