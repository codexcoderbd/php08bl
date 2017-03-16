<?php 
session_start();
	include('conn.php');
	
	$valid_email="";
	if(isset($_POST['SUBMIT']) && $_POST['SUBMIT']=='Login')
	{
		$admin_email=$_POST['admin_email'];
		$psw=$_POST['psw'];
		
		$sel="SELECT * FROM admin_login WHERE admin_email='$admin_email'";
		$res=mysql_query($sel) or mysql_error();
		$fet=mysql_fetch_array($res);
		$row=mysql_num_rows($res);
		if($row>0)
		{
			if($psw==$fet['psw'])
			{
				echo "session = ".$_SESSION['admin_email']=$email;
				
				echo "<script>alert('Logged In');
					window.location='admin_home.php'
				</script>";		
			}
			else
			{	
				$valid_email=$admin_email;
				echo "<script>alert('Password is Incorrect');
				</script>";
			}
		}
		else
		{
			echo "<script>alert('Access Denied');
			</script>";
		}
		
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
	.button
	{
		margin-right:50px;
		height:30px;
		width:100px;
		background-color:#0000FF;
		color:#999999;
		border:#999999 solid 2px;
		border-radius:10px;
	}
	</style>
</head>

<body>
	<form name="frn_login"  method="post">
		<table border="1" align="center" rules="groups" width="400">
			<tr bgcolor="#0000FF">
				<th colspan="2" style="color:#CCCCCC">Admin Login</th>
			</tr>
			<tr>
				<td colspan="2"><?php echo $_SESSION['msg'];?></td>
			</tr>
			<tr>
				<td><b><u>E</u></b>mail</td>
				<td><input type="text" name="admin_email" value="<?php if(isset($valid_email)) echo $valid_email; ?>"/></td>
			</tr>
			<tr>
				<td><b><u>P</u></b>assword</td>
				<td><input type="password" name="psw" /></td>
			</tr>
			
			<tr>
				<td colspan="2" align="right"><input type="submit" name="SUBMIT" value="Login" class="button" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 

?>