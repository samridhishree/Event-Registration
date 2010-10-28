<?php
require_once('authorize.php') ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Gravitas - Admin College</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <div id="allcontent">
  <img src="images/gravitas.png" alt="Gravitas 2010 Logo" id="logo" />
  <h3 id="page_title">Gravitas - Admin College</h3>

<?php
	require_once('appvars.php');
   
   $code = '' ;
   $col_name = '' ;
  ?>
   
   <form method="post" id="reg_form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
	 <legend>Select College</legend>
	   <ol>
	   
	    <li>
			<label for="code">College Name</label>
			<select name="code">
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
		</ol>
	</fieldset>
	
	<fieldset>
	  <input type="submit" name="submit" value="Get Details" />
	</fieldset>
	</form>
	
	<?php
   
   if (isset($_POST['submit'])) {
		
		$code = $_POST['code'] ;
		
		$query = "Select name from college where code = '$code'" ;
		$result = mysqli_query($dbc, $query) ;
		$row = mysqli_fetch_array($result) ;
		$col_name = $row['name'] ;
		
		$query = "Select count(t_id) AS count from team where code = '$code'" ;
		$result = mysqli_query($dbc, $query) ;
		$row = mysqli_fetch_array($result) ;
		$total_t = $row['count'] ;
		
		$query = "Select sum(p_male) AS sum from team where code = '$code'" ;
		$result = mysqli_query($dbc, $query) ;
		$row = mysqli_fetch_array($result) ;
		$total_mp = $row['sum'] ;
		
		$query = "Select sum(p_female) AS sum from team where code = '$code'" ;
		$result = mysqli_query($dbc, $query) ;
		$row = mysqli_fetch_array($result) ;
		$total_fmp = $row['sum'] ;
		
		$total_p = $total_mp + $total_fmp ;
		
		
		
		echo '<h3>Name : ' . $col_name . '</h3>' ;
		echo 'Code : '  .  $code . '<br />' ;
		echo 'Number of Contingents : '  .  $total_t . '<br />' ;
		echo 'Number of participants : '  .  $total_p . '<br />' ;
		echo 'Number of male participants : '  .  $total_mp . '<br />' ;
		echo 'Number of female participants : '  .  $total_fmp . '</h4>' ;
		
		
		echo '<p><table id="box-table-a"><thead> <tr><th>Event Name </th> <th>Teams</th><th>Participants</th>  </tr></thead>' ;
		echo '<tbody>' ;
		
		for($i = 1; $i <= $max_events; $i++ )
		{
		

		/*$query = "Select e_num from events where subtype = 'appliedengg'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching Applied Engg event numbers!!');
		*/
		$e_num = $i ;
		$query1 = "Select e.e_name AS name, sum(r.num_teams) AS sumt, sum(r.num_par) AS sump from events e, reg r where e.e_num = r.e_num AND e.e_num = '$e_num' AND r.code = '$code'" ;
		$result1 = mysqli_query($dbc, $query1) or die('Error fetching Applied Engg events!!');
		$row1 = mysqli_fetch_array($result1);
			
		$e_name = $row1['name'] ;
		$sumt = $row1['sumt'] ;
		$sump = $row1['sump'] ;
		
		if (($sumt != '') || ($sump != '')) 
			echo '<tr><td>' . $e_name . '</td><td>' . $sumt . '</td><td>' . $sump . '</td></tr>' ;
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