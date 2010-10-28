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


<?php
  //displaying form to enter the dd details
  $dbc = mysqli_connect('localhost', 'root', '', 'gravitas1') or die("Error connecting to the database");
   
  // $code = $_POST['code'];
  //  $t_id = $_POST['t_id'];
   
   if (!isset($_POST['submit']))
   {
   $code = $_GET['code'] ;
   $t_id = $_GET['t_id'] ;
   }
   
   
   $dd_insert = 'yes';
   $dd_amt = 0 ; 
   $issue_date = 0;
   $bank_name = 0;
   $dd_num = '';
   $dac = 0;
   $dar = 0;
   $output_form = 'yes';
   
   if (isset($_POST['submit'])) {
     $code = $_POST['code'];
     $t_id = $_POST['t_id'];
    $dd_amt = $_POST['dd_amt'];
	$issue_date = $_POST['issue_date'];
    $bank_name = $_POST['bank_name'];
    $dd_num = $_POST['dd_num'];
	$caution = $_POST['caution'];
	$dac = $_POST['dac'];
	$dar = $_POST['dar'];
	$output_form = 'no';
	
	/* if (empty($dd_amt)) {
      // $dd_amt is blank
      echo '<p class="error">You forgot to enter the DD amount.</p>';
      $output_form = 'yes';
    }

	if (empty($issue_date)) {
      // $issue_date is blank
      echo '<p class="error">You forgot to enter the Issue Date.</p>';
      $output_form = 'yes';
    }
       
   if (empty($bank_name)) {
      // $bank_name is blank
      echo '<p class="error">You forgot to enter the name of the bank.</p>';
      $output_form = 'yes';
    } */

   if (empty($dd_num)) {
      // $dd_num is blank
      //echo '<p class="error">You forgot to enter the DD number.</p>';
      //$output_form = 'yes';
      $dd_insert = 'no';
    } 
}

   
   if ($output_form == 'yes') {

	?>

	<form method="post" id="reg_form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<fieldset>
		 <legend>Caution Deposit(Rs.500)Refundable</legend>
		    <ol>
	         <li>
			     <input type="radio" name="caution" value="0" style=" width: 20px; margin-left:200px"/>Paid<br/>
				<input type="radio" name="caution" value="1" style=" width: 20px; margin-left:200px" />Refunded
			</li>
		</ol>
		</fieldset>
		
		<fieldset>
		<legend>Enter DD Details</legend>
		 <ol>

	      <li>
		   <label for="dd_amt">DD Amount</label>
		   <input id="dd_amt" name="dd_amt" type="text" 
		  <?php 
		   if($dd_amt != '') 
		   { 
			echo 'value="' . $dd_amt . '"' ;
		   } 
		   else 
		   { 
			echo 'placeholder="DD amount"' ;
		   }
		  ?>
		  
		   />
		  </li>
					
			
		   <li>
				<label for="issue_date">Date of issue</label>
		   <input id="issue_date" name="issue_date" type="text" 
		  <?php 
		   if($issue_date != '') 
		   { 
			echo 'value="' . $issue_date . '"' ;
		   } 
		   else 
		   { 
			echo 'placeholder="dd/mm/yyyy"' ;
		   }
		  ?>
		  
		   />
		  </li>


		   <li>
				<label for="bank_name">Bank Name</label>
		   <input id="bank_name" name="bank_name" type="text" 
		  <?php 
		   if($bank_name != '') 
		   { 
			echo 'value="' . $bank_name . '"' ;
		   } 
		   else 
		   { 
			echo 'placeholder="Name of the bank"' ;
		   }
		  ?>
		  
		   />
		  </li>

		  <li>
				<label for="dd_num">DD Number</label>
		   <input id="dd_num" name="dd_num" type="text" 
		  <?php 
		   if($dd_num != '') 
		   { 
			echo 'value="' . $dd_num . '"' ;
		   } 
		   else 
		   { 
			echo 'placeholder="DD Number"' ;
		   }
		  ?>
		  
		   />
		  </li>
		  
		  <li>
				<label for="dac">Difference amount collected</label>
		   <input id="dac" name="dac" type="text" 
		  <?php 
		   if($dac != '') 
		   { 
			echo 'value="' . $dac . '"' ;
		   } 
		   
		  ?>
		  
		   />
		  </li>

		  
		  <li>
				<label for="dar">Difference amount refunded </label>
		   <input id="dar" name="dar" type="text" 
		  <?php 
		   if($dar != '') 
		   { 
			echo 'value="' . $dar . '"' ;
		   } 
		 ?>
		  
		   />
		  </li>
		 <?php
		    echo '<input id="code" name="code" type="hidden" value="' . $code . '" />' ;
	   	    echo '<input id="t_id" name="t_id" type="hidden" value="' . $t_id . '" />' ;
          ?>			
	
		</ol>
		</fieldset>
		
		<fieldset>
		  <input type="submit" name="submit" value="Register" />
		</fieldset>
	  </form>

	<?php
	   }
	   
	    else if ($output_form == 'no') {
   
	 // code to insert data into the table dd...
	   
	if($dd_insert == 'yes')
	{
	   $query= "INSERT INTO dd (code, t_id, dd_amt, issue_date, bank_name, dd_num) VALUES ('$code', '$t_id', '$dd_amt', '$issue_date', '$bank_name', '$dd_num')";
	   $result = mysqli_query($dbc,$query) or die('Error inserting into table dd'); 
	}
	   
	 //code to update payment
	 
	   $query ="UPDATE payment SET caution='$caution', dac='$dac', dar='$dar' WHERE code='$code' AND t_id='$t_id'";
	   $result = mysqli_query($dbc,$query) or die('Error updating table payment');
	   
	    echo '<p> Registration successful. </p>' ;
	    echo '<a href="index.php" class="links" id="index_to_admin">Registrations Page</a>';
        echo '<a href="admin.php" class="links" id="index_to_admin">Go to admin page</a>' ;
        echo '<a href="createcollege.php" class="links" id="index_to_admin">Enter new college</a>';
		}
        require_once('footer.php');
  ?>
  
 </div>
 </body>
 </html>