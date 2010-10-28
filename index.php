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
  <h3 id="page_title">Gravitas - Event Registration</h3>
  
  <h4><a href="createcollege.php" class="links" id="createcollege">Enter new college</a></h4> 	

<?php
   //connecting to database
   $dbc = mysqli_connect('localhost', 'root', '', 'gravitas1') or die("Error connecting to the database");
    
	$t_id = '';
    $code = '';
	$col_name =  '' ;
	$leader1 = '';
    $leader2 = '';
    $phone1 = '';
	$phone2 = '' ;
	$p_male = 0 ;
	$p_female = 0;
	$staff_male = 0 ;
	$staff_female = 0 ;      
    //$output_form = 'no';
	$output_form = 'yes' ;

  if (isset($_POST['submit'])) {
    $code = $_POST['col_name'];
	$leader1 = $_POST['leader1'];
    $leader2 = $_POST['leader2'];
    $phone1 = $_POST['phone1'];
	$phone2 = $_POST['phone2'] ;
    $p_male = $_POST['p_male'] ;
	$p_female = $_POST['p_female'] ;
	$staff_male = $_POST['staff_male'] ;
	$staff_female = $_POST['staff_female'] ;
	
	$query = "Select name from college where code = '$code'" ;
	$data = mysqli_query($dbc, $query) or die ('Error getting code from database.') ;
	$row = mysqli_fetch_array($data) ;
	$col_name = $row['name'] ;
	
	$output_form = 'no';

    if (empty($code)) {
      // $full_name is blank
      echo '<p class="error">You forgot to select college name.</p>';
      $output_form = 'yes';
    }

    if (empty($leader1)) {
      // $reg_no is blank
      echo '<p class="error">You forgot to enter the name of Contingent Leader 1.</p>';
      $output_form = 'yes';
    }

    if (!preg_match('/^\d{10}$/', $phone1)) {
      // $mobile is not valid
      echo '<p class="error">Phone number of Contingent Leader 1 is invalid. It should be of 10 digits</p>';
      $output_form = 'yes';
    }

	if (!empty($phone2))
	{
		if (!preg_match('/^\d{10}$/', $phone2)) {
		  // $mobile is not valid
		  echo '<p class="error">Phone number of Contingent Leader 2 is invalid. It should be of 10 digits</p>';
		  $output_form = 'yes';
		}
	}
	
    /*if (empty($p_male)) {
      // $job is blank
      echo '<p class="error">You forgot to enter the number of male participants.</p>';
      $output_form = 'yes';
    }
	
	if ($p_female != '') {
      // $job is blank
      echo '<p class="error">You forgot to enter the number of female participants.</p>';
      $output_form = 'yes';
    }
	
	if (empty($staff_male)) {
      // $job is blank
      echo '<p class="error">You forgot to enter the number of male staff.</p>';
      $output_form = 'yes';
    }
	
	if (empty($staff_female)) {
      // $job is blank
      echo '<p class="error">You forgot to enter the number of female staff.</p>';
      $output_form = 'yes';
    }
	*/
	

	/*$query = "Select * From reg WHERE reg_no = '$reg_no' AND e_id = '$e_id'" ;
	$result = mysqli_query($dbc,$query) ;
	$query1 = "Select e_name from events Where e_id =  '$e_id'" ;
	$data = mysqli_query($dbc, $query1) or die('Cannot find event') ;
	
	$row = mysqli_fetch_array($data) ;
	$e_name = $row['e_name'] ;
	
	if (mysqli_num_rows($result) != 0)
	{
		$row = mysqli_fetch_array($result) ;
		echo '<p class="error">There is an existing registration by register no.' . $row['reg_no'] . ' for event ' . $e_name ;
        $output_form = 'yes' ;
	}
	

	}
  else {
    $output_form = 'yes';
  }
  */
  
  
  }
  
  if ($output_form == 'yes') {
?>

<form method="post" id="reg_form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
	 <legend>Enter Details</legend>
	   <ol>
	   
	    <li>
			<label for="col_name">College Name</label>
			<select name="col_name">
		    <option value=""></option>  
		<?php
		     $query = "SELECT name, code FROM college order by name";
            $data = mysqli_query($dbc, $query);
			while ($row = mysqli_fetch_array($data))
			{
			  echo '<option value="' . $row['code'] . '">' . $row['name'] . '</option>';
			 }
		?>
        </select> 
        </li>
		
		<li>
		    <label for="leader1">Contingent Leader 1</label>
	   <input id="leader1" name="leader1" type="text" 
	  <?php 
	   if($leader1 != '') 
	   { 
		echo 'value="' . $leader1 . '"' ;
	   } 
	   else 
	   { 
		echo 'placeholder="First and last name"' ;
	   }
	  ?>
	  
	   />
	  </li>
	  
	  <li>
		<label for="phone1">Mobile Number - Leader 1</label>
		<input id="phone1" name="phone1" type="text" 
		<?php 
		if($phone1 != '') 
		{ 
			echo 'value="' . $phone1 . '"' ;
		} 
		else 
		{	 
			echo 'placeholder="9790297902"' ;
		}
   ?>
  
    />
   </li>

	  
	  <li>
		    <label for="leader2">Contingent Leader 2</label>
	   <input id="leader2" name="leader2" type="text" 
	  <?php 
	   if($leader2 != '') 
	   { 
		echo 'value="' . $leader2 . '"' ;
	   } 
	   else 
	   { 
		echo 'placeholder="First and last name"' ;
	   }
	  ?>
	  
	   />
	  </li>
		   
		
	  
	<li>
		<label for="phone2">Mobile Number - Leader 2</label>
		<input id="phone2" name="phone2" type="text" 
		<?php 
		if($phone2 != '') 
		{ 
			echo 'value="' . $phone2 . '"' ;
		} 
		else 
		{	 
			echo 'placeholder="9790297902"' ;
		}
  ?>
  
   />
  </li>
		
	<li>
		<label for="p_male">Number of male participants</label>
		<input id="p_male" name="p_male" type="text" 
	<?php 
		if($p_male != '') 
		{ 
			echo 'value="' . $p_male . '"' ;
		} 
		else 
		{	 
			echo 'placeholder=""' ;
		}
  ?>
  
 />
  </li>
	
	<li>
		<label for="p_female">Number of female participants</label>
		<input id="p_female" name="p_female" type="text" 
	<?php 
		if($p_female != '') 
		{ 
			echo 'value="' . $p_female . '"' ;
		} 
		else 
		{	 
			echo 'placeholder=""' ;
		}
  ?>
  
 />
  </li>
	
   <li>
		<label for="staff_male">Number of male staff</label>
		<input id="staff_male" name="staff_male" type="text" 
	<?php 
		if($staff_male != '') 
		{ 
			echo 'value="' . $staff_male . '"' ;
		} 
		else 
		{	 
			echo 'placeholder=""' ;
		}
  ?>
  
 />
  </li>
  
  <li>
		<label for="staff_female">Number of female staff</label>
		<input id="staff_female" name="staff_female" type="text" 
	<?php 
		if($staff_female != '') 
		{ 
			echo 'value="' . $staff_female . '"' ;
		} 
		else 
		{	 
			echo 'placeholder=""' ;
		}
  ?>
  
 />
  </li>
  </ol>
  
  
	
	
   </fieldset>
   
    <fieldset>
	  <input type="submit" name="submit" value="Register" />
	</fieldset>
</form>

<?php
  }
 
  else if ($output_form == 'no') {
   
	 // code to insert data into the database...
	$query = "INSERT INTO team(code, leader1, leader2, phone1, phone2, p_male, p_female, staff_male, staff_female, reg_date) VALUES ('$code', '$leader1', '$leader2', '$phone1', '$phone2', '$p_male', '$p_female', '$staff_male', '$staff_female', CURDATE())";
	mysqli_query($dbc, $query) or die('Error adding entry to database.') ;

	$query = "SELECT t_id from team where code = '$code' AND leader1 = '$leader1'";
	$data = mysqli_query($dbc, $query) or die('Error getting team from database.') ;
	$row = mysqli_fetch_array($data);
	$t_id = $row['t_id'];
	
	echo '<div id="reg_success">' ;
	echo '<p> Registration successful. </p>' ;
	
	echo '<p id= "reg_details">' ;

	echo '<br />College Name: ' . $col_name ;
	echo '<br />Contingent Leader 1: ' . $leader1 ;
	echo '<br />Phone Number of CL 1: ' . $phone1 ;
	echo '<br />Contingent Leader 2: ' . $leader2 ;
	echo '<br />Phone Number of CL 2: ' . $phone2 ;
	echo '<br />Number of male participants: ' . $p_male ;
	echo '<br />Number of female participants: ' . $p_female ;
	echo '<br />Number of male staff: ' . $staff_male ;
	echo '<br />Number of female staff: ' . $staff_female ;
	echo '</div>' ;
	
	echo '<a href="eventdetails.php?code=' . $code . '&t_id=' . $t_id . '" class="links" id="event_details">Enter event details</a>' ;
	
	echo '<a href="del.php?t_id=' . $t_id . '&col_name=' . $col_name . '" class="links" id="delete_reg">Delete this registration</a>' ;
	}

	echo '<p><a href="admin.php" class="links" id="index_to_admin">Go to admin page</a></p>' ;
	

  require_once('footer.php');
	?>



</div>
</body>
</html>