<?php
require_once('authorize.php') ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Gravitas - Events Details</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
  <div id="allcontent">
  <img src="images/gravitas.png" alt="Gravitas 2010 Logo" id="logo" />
  

<?php
	require_once('appvars.php');
   

	$e_num = $_GET['e_num'] ;
	$numt = $_GET['sumt'] ;
	$nump = $_GET['sump'] ;
	$date = $_GET['date'];
	
	$query = "Select e_name from events where e_num = '$e_num'" ;
	$result = mysqli_query($dbc, $query) or die('Error fetching Event  Name!!');
	$row = mysqli_fetch_array($result) ;
	$e_name = $row['e_name'] ;
	
	echo '<h3 id="page_title">' . $e_name . ' - Events Details</h3>' ;
	
	//echo '</h3 class="subtitle">' . $e_name . '</h3>' ;
	
	echo '<p><table id="box-table-a"><thead> <tr><th>College Name </th> <th>Code</th><th>Teams</th><th>Participants</th></tr></thead>' ;
	echo '<tbody>' ;
	
	$i = 1 ;
	
	for($i = 1; $i <= $max_colleges; $i++)
	{
		$code = $i ;
		$query1 = "Select c.name AS name, sum(r.num_teams) AS sumt, sum(r.num_par) AS sump from college c, reg r, team t where c.code = r.code AND r.e_num = '$e_num' AND c.code = '$code' AND t.t_id = r.t_id AND t.reg_date = '$date'" ;
		$result1 = mysqli_query($dbc, $query1) or die('Error fetching event details!!');
		$row1 = mysqli_fetch_array($result1) ;
		$col_name = $row1['name'] ;
		$sumt = $row1['sumt'] ;
		$sump = $row1['sump'] ;
		
		if (($sumt != '') || ($sump != '')) 
			echo '<tr><td>' . $col_name . '</td><td>' . $code. '</td><td>' . $sumt . '</td><td>' . $sump . '</td></tr>' ;
		
	}
	echo '<tr> <td>Total</td> <td> --- </td> <td>'. $numt . '</td><td>' . $nump . '</td></tr>' ;
	echo '</tbody></table></p>' ; 
	
	echo '<p><a href="admin.php" class="links">Go to Admin Page</a></p>' ;
	echo '<p><a href="admin_date.php" class="links">Go to Date Admin Page</a></p>' ;
	echo '<p><a href="index.php" class="links">Go to Registrations Page</a></p>' ;
	
	
	require_once('footer.php') ;
	?>
	
	</div>
	</body> 
	</html> 
	
