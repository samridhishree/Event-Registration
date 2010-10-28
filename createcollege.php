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
  <h3 id="page_title">Gravitas - New College</h3>
  
  <h4><a href="index.php" class="links" id="createcollege">Create new Registration</a></h4> 
  
  <?php
   //connecting to database
   $dbc = mysqli_connect('localhost', 'root', '', 'gravitas1') or die("Error connecting to the database");
    
    $code = '';
	$col_name =  '' ;
	$output_form = 'yes';
	 
	if (isset($_POST['submit'])) {
    $code = $_POST['code'];
	$col_name = $_POST['col_name'];
	//echo $col_name;
	
	$output_form = 'no';
	
	if (empty($col_name)) {
      // $full_name is blank
      echo '<p class="error">You forgot to enter college name.</p>';
      $output_form = 'yes';
    }
    
	if (empty($code)) {
      // $full_name is blank
      echo '<p class="error">You forgot to enter college code.</p>';
      $output_form = 'yes';
    }
	
	$query = "Select code, name From college WHERE code = '$code'" ;
	$result = mysqli_query($dbc,$query) or die('Error checking the college code') ;
	//$query1 = "Select e_name from events Where e_id =  '$e_id'" ;
	//$data = mysqli_query($dbc, $query1) or die('Cannot find event') ;
	
	//$row = mysqli_fetch_array($result) ;
	
	if (mysqli_num_rows($result) != 0)
	{
		$row = mysqli_fetch_array($result) ;
		echo '<p class="error">College ' . $row['name'] . ' already exists with the code ' . $row['code'] ;
        $output_form = 'yes' ;
	}
	
    
 }
 
 if($output_form == 'yes')
 {
 ?>
 
 <form method="post" id="reg_form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
	 <legend>Enter Details</legend>
	   <ol>

	    <li>
		<label for="code">Code</label>
	   <input id="code" name="code" type="text" 
	  <?php 
	   if($code != '') 
	   { 
		echo 'value="' . $code . '"' ;
	   } 
	   else 
	   { 
		echo 'placeholder="Code for the new college"' ;
	   }
	  ?>
	  
	   />
	  </li>
	  
	  <li>
		<label for="col_name">College Name</label>
	   <input id="col_name" name="col_name" type="text" 
	  <?php 
	   if($col_name != '') 
	   { 
		echo 'value="' . $col_name . '"' ;
	   } 
	   else 
	   { 
		echo 'placeholder="Name of the college"' ;
	   }
	  ?>
	  
	   />
	  </li>
	 </ol>
	</fieldset>
	
	<fieldset>
	<input type="submit" name="submit" value="Create College" />
	</fieldset>
</form>

<?php
  }
 
  else if ($output_form == 'no') {
   
	 // code to insert data into the database...
	$query = "INSERT INTO college(code, name) VALUES ('$code' , '$col_name')";
	mysqli_query($dbc, $query) or die('Error adding entry to database.') ;

	echo '<div id="reg_success">' ;
	echo '<p> Registration successful. </p>' ;
	
	echo '<p id= "reg_details">' ;

	echo '<br />College Code: ' . $code ;
	echo '<br />College Name: ' . $col_name ;
    echo '</div>';    
	
	echo '<p><a href="createcollege.php" class="links">Create new College</a></p>' ;
    echo '<p><a href="admin.php" class="links">Go to admin page</a></p>' ;
	//echo '<a href="index.php" class="links">Create new registration</a>' ;

}
?>



<div id="footer">
<p>&copy; 2010 Designed and developed by <a href="http://www.samridhishree.com" class="devs">Samridhi Shree</a> and <a href="http://www.rohitmishra.me" class="devs">Rohit Mishra</a>

</div>
</body>
</html>	