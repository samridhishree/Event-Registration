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
   
   $code = $_GET['code'] ;
   $t_id = $_GET['t_id'];
   
   ?>
   
   <form method="post" id="reg_form" action="confirmation.php">
    <fieldset>
	 <legend>Non-Premium Events</legend>
	   <h4> Applied Engineering </h4>
	   <ol>
	   
	   <?php
		$query = "Select e_num, e_name, team_limit from events where subtype = 'appliedengg'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching Applied Engg events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';
  
    echo '<h4> BioxSYN </h4>';  
	 echo '<ol>';  
	   $query = "Select e_num, e_name, team_limit from events where subtype = 'bioxsyn'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching BioxSyn events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';
		
	echo '<h4> BITS and BYTES </h4>';
     echo '<ol>'; 	
		
		$query = "Select e_num, e_name, team_limit from events where subtype = 'bitsandbytes'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching Bits and Bytes events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';
	
	echo '<h4> Management </h4>';
     echo '<ol>'; 	
		
		$query = "Select e_num, e_name, team_limit from events where subtype = 'management'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching management events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';
	
	echo '<h4> Builtrix</h4>';
     echo '<ol>'; 	
		
		$query = "Select e_num, e_name, team_limit from events where subtype = 'builtrix'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching Builtrix events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';
	
	echo '<h4> electroVIT</h4>';
     echo '<ol>'; 	
		
		$query = "Select e_num, e_name, team_limit from events where subtype = 'electrovit'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching electroVIT events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';
	
	echo '<h4> Environ</h4>';
     echo '<ol>'; 	
		
		$query = "Select e_num, e_name, team_limit from events where subtype = 'environ'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching Environ events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';
	 

echo '<h4> graVITas Special </h4>';
     echo '<ol>'; 	
		
		$query = "Select e_num, e_name, team_limit from events where subtype = 'special'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching graVITas Special events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';


echo '<h4> Quizzes </h4>';
     echo '<ol>'; 	
		
		$query = "Select e_num, e_name, team_limit from events where subtype = 'quizzes'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching quizzes!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';	
	   
	   
echo '<h4> Non Technical Events</h4>';
     echo '<ol>'; 	
		
		$query = "Select e_num, e_name, team_limit from events where subtype = 'nontech'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching Non Technical events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';	   
	   ?>
	   
	</fieldset>
	<fieldset>
		<legend>No. of participants in Non Premium Events</legend>
		<ol>
		  <li>
                    <label for="a_nonpremium">Enter no. of participants</label>
			<input id="a_nonpremium" name="a_nonpremium" type="text" placeholder="Number of Participants" />
		  </li>
		</ol>
	</fieldset>
	
	<fieldset>
		 <legend>Robotix</legend>
		   <ol>
		   
		   <?php
			$query = "Select e_num, e_name, team_limit from events where e_type = 'robotix'" ;
			$result = mysqli_query($dbc, $query) or die('Error fetching Robotix events!!');
			
			while($row = mysqli_fetch_array($result))
			{
				
				
				echo '<li>' ;
					echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
					echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
					
					echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
					echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
				echo '</li>' ;
			}
		echo '</ol>';
	?>
	 </fieldset>
	
	<fieldset>
	 <legend>Gaming</legend>
	  <ol>
	   
	   <?php
		$query = "Select e_num, e_name, team_limit from events where e_type = 'gaming'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching Gaming events!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';
	?>
	 </fieldset>
	
	<fieldset>
	 <legend>Workshops</legend>
	   
	   <ol>
	   
	   <?php
		$query = "Select e_num, e_name, team_limit from events where e_type = 'workshops'" ;
		$result = mysqli_query($dbc, $query) or die('Error fetching workshops!!');
		
		while($row = mysqli_fetch_array($result))
		{
			
			
			echo '<li>' ;
				echo '<label for="' . $row['e_num'] . '_t">' . $row['e_name'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_t" name="' . $row['e_num'] . '_t" type="text" placeholder="Number of teams" />' ;
				
				echo '<br /><label for="' . $row['e_num'] . '_p">Team Limit: ' . $row['team_limit'] . '</label>' ;
				echo '<input id="' . $row['e_num'] . '_p" name="' . $row['e_num'] . '_p" type="text" placeholder="Number of Participants" />' ;
		    echo '</li>' ;
		}
	echo '</ol>';
	
    echo '<input id="code" name="code" type="hidden" value="' . $code . '" />' ;
    echo '<input id="t_id" name="t_id" type="hidden" value="' . $t_id . '" />' ;	
	 
	 ?>
  </fieldset>
 
  
  <fieldset>
	  <input type="submit" name="submit" value="Register" />
	</fieldset>
  
	</form>
	
	
<?php
    require_once('footer.php');
?>

</div>
</body>
</html>