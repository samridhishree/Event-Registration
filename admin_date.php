<?php
require_once('authorize.php') ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Gravitas - Admin Date</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <div id="allcontent">
  <img src="images/gravitas.png" alt="Gravitas 2010 Logo" id="logo" />
  <h3 id="page_title">Gravitas - Admin Date</h3>

<?php
	require_once('appvars.php');
   
   $code = '' ;
   $col_name = '' ;
  ?>
   
   <form method="post" id="reg_form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <fieldset>
	 <legend>Select Date</legend>
	   <ol>
	   
	    <li>
			<label for="date">College Date</label>
			<select name="date">
		    <option value="2010-09-16">16/09/2010</option>
			<option value="2010-09-17">17/09/2010</option>
			<option value="2010-09-18">18/09/2010</option>
			<option value="2010-09-19">19/09/2010</option>
		    </select> 
        </li>
		</ol>
	</fieldset>
	
	<fieldset>
	  <input type="submit" name="submit" value="Get Details" />
	</fieldset>
	</form>
	
	<?php
   
   if (isset($_POST['submit'])) {
		
		$date = $_POST['date'] ;
		
		$i = 1 ;
		
		echo '<h3 class="subtitle"> Date : ' . $date . '</h3>';
	echo '<p><table id="box-table-a"><thead> <tr><th>Event Name </th> <th>Teams</th><th>Participants</th> <th>Details</th> </tr></thead>' ;
		echo '<tbody>' ;
	
	for($i = 1; $i <= $max_events; $i++ )
	{
		

		/*$query = "Select e_num from events where subtype = 'appliedengg'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching Applied Engg event numbers!!');
		*/
		$e_num = $i ;
		$query1 = "Select e.e_name AS name, sum(r.num_teams) AS sumt, sum(r.num_par) AS sump from events e, reg r,team t where e.e_num = r.e_num AND e.e_num = '$e_num' AND t.t_id = r.t_id AND t.reg_date = '$date'" ;
		$result1 = mysqli_query($dbc, $query1) or die('Error fetching Applied Engg events!!');
		$row1 = mysqli_fetch_array($result1);
			
		$e_name = $row1['name'] ;
		$sumt = $row1['sumt'] ;
		$sump = $row1['sump'] ;
		echo '<tr><td>' . $e_name . '</td><td>' . $sumt . '</td><td>' . $sump . '</td><td><a href="date_event_details.php?e_num=' . $e_num . '&sumt=' . $sumt . '&sump=' . $sump . '&date=' . $date . '">Details</a></td></tr>' ;
	}
	echo '</tbody></table></p>' ;
}	
	
	echo '<p><a href="admin.php" class="links">Go to Admin Page</a></p>' ;
	echo '<p><a href="index.php" class="links">Go to Registrations Page</a></p>' ;
	
	
	require_once('footer.php') ;
	?>
	
</div>
</body> 
</html> 
	
