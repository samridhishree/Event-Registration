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
   //connecting to database
   $dbc = mysqli_connect('localhost', 'root', '', 'gravitas1') or die("Error connecting to the database");
   
   $code = $_POST['code'] ;
   $t_id = $_POST['t_id'];
   $i = 0;
   $t = 0;
   $p = 0;
   
   for($i = 1; $i <= 20; $i++)
   {
     if( $_POST['' . $i . '_t'] != '' || $_POST['' . $i . '_p'] != '' || $_POST['' . $i . '_p'] != 0 || $_POST['' . $i . '_t'] != 0)
	 {
	   $t = $_POST['' . $i . '_t'] ;
	   $p = $_POST['' . $i . '_p'] ;
	   
	   $query = "INSERT INTO reg (t_id, code, e_num, num_teams, num_par) VALUES ('$t_id', '$code', '$i', '$t', '$p')";
	   $result = mysqli_query($dbc, $query) or die('Error inserting event details!!');
	 }
   }
   
   $query1 = "Select sum(r.num_par) AS sum from reg r, events e WHERE r.e_num = e.e_num AND e.e_type = 'nonpremium' AND r.code = '$code' AND t_id = '$t_id'" ;
   $data = mysqli_query($dbc, $query1) or die('Error calulating amount for non-premium events.');
   $row = mysqli_fetch_array($data) ;
   $p_nonpremium = $row['sum'] ;
   $a_nonpremium = 100 * $p_nonpremium ;
   
  //  echo $a_nonpremium ;
  
   $query1 = "Select sum(r.num_teams * e.e_price) AS sum from reg r, events e WHERE r.e_num = e.e_num AND e.e_type = 'gaming' AND r.code = '$code' AND t_id = '$t_id'" ;
   $data = mysqli_query($dbc, $query1) or die('Error calulating amount for gaming events.');
   $row = mysqli_fetch_array($data) ;
   $a_gaming = $row['sum'] ;
   
   $query1 = "Select sum(r.num_teams) AS sum from reg r, events e WHERE r.e_num = e.e_num AND e.e_type = 'robotix' AND r.code = '$code' AND t_id = '$t_id'" ;
   $data = mysqli_query($dbc, $query1) or die('Error calulating amount for robotix events.');
   $row = mysqli_fetch_array($data) ;
   $t_robotix = $row['sum'] ;
   $a_robotix = 300 * $t_robotix ;
   
   $query1 = "Select sum(r.num_teams * e.e_price) AS sum from reg r, events e WHERE r.e_num = e.e_num AND e.e_type = 'workshops' AND r.code = '$code' AND t_id = '$t_id'" ;
   $data = mysqli_query($dbc, $query1) or die('Error calulating amount for workshop events.');
   $row = mysqli_fetch_array($data) ;
   $a_workshops = $row['sum'] ;
   
   $total = $a_nonpremium + $a_gaming + $a_robotix + $a_workshops ;
   
   $query = "INSERT INTO payment(t_id, code, non_premium, robotic, gaming, workshops, total) VALUES('$t_id', '$code', '$a_nonpremium', '$a_robotix', '$a_gaming', '$a_workshops', '$total')";
    mysqli_query($dbc, $query) or die('Error adding to payment table');
   
   echo 'Amount for Non-Premium Events: ' . $a_nonpremium . '<br />';
   echo 'Amount for Gaming Events: ' . $a_gaming . '<br />';
   echo 'Amount for Robotics Events: ' . $a_robotix . '<br />';
   echo 'Amount for Workshops: ' . $a_workshops . '<br />';
   echo 'Total Amount: ' . $total ;
   
   <form method="post" id="reg_form" action="<final.php">
    <fieldset>
	 <legend>Caution Deposit</legend>
	   <ol>
	   
	    <li>
			<label for="caution">Rs. 500(Refundable): </label>
			<select name="col_name">
		    <option value=""></option>  
		<?php
		     $query = "SELECT name, code FROM college";
            $data = mysqli_query($dbc, $query);
			while ($row = mysqli_fetch_array($data))
			{
			  echo '<option value="' . $row['code'] . '">' . $row['name'] . '</option>';
			 }
		?>
        </select> 
        </li>
   
 require_once('footer.php');  

  ?>
 
 
 </div>
 </body>
 </html>