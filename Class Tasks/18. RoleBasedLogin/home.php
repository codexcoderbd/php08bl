<?php 
	include('conn.php');
	session_start();
	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/user_style.css" />
</head>

<body>

<div id="main">
	<div id="header">
		<div id="logo">My Collection</div>
		<div id="right_head">
			<p class="right">
			<?php 
			$sel="SELECT * FROM login WHERE email='".$_SESSION['email']."'";
			$res=mysql_query($sel);
			$fet=mysql_fetch_array($res);
			echo $fet['fname']." ".$fet['lname'];
			?> | <a href="logout.php">Logout</a></p>
		</div>
	</div>
	<div id="container">
		<div id="sidebar">
			<?php include 'sidebar.php'; ?>
		</div>
		<div id="content">
			<?php 	
				echo "<table align='center'>";
						echo "<tr>
								<td>Firstname</td>
								<td>Lastname</td>
								<td>Email</td>
								<td>Gender</td>
								
						</tr>";
					$q="SELECT * FROM login "; 
					$result=mysql_query($q);
					while($fetch=mysql_fetch_array($result))
					{
						
						echo "<tr>
								<td>$fetch[fname]</td>
								<td>$fetch[lname]</td>
								<td>$fetch[email]</td>
								<td>$fetch[gender]</td>
								
						</tr>";
								
					}
					echo "</table>";
			?>		
		</div>
	</div>
	<div id="footer"></div>
</div>
	
	
	<span style="text-align:right; text-decoration:none;"></span>
</body>
</html>
