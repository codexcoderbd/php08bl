<?php 
	include('conn.php');
	session_start();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">

(function($) 
{
	var map=new Array();
	$.Watermark =
	 {
		ShowAll:function()
		{
			for (var i=0;i<map.length;i++)
			{
				if(map[i].obj.val()=="")
				{
					map[i].obj.val(map[i].text);					
					map[i].obj.css("color",map[i].WatermarkColor);
				}
				else
				{
				    map[i].obj.css("color",map[i].DefaultColor);
				}
			}
		},
		HideAll:function()
		{
			for (var i=0;i<map.length;i++)
			{
				if(map[i].obj.val()==map[i].text)
					map[i].obj.val("");					
			}
		}
	}
	
	$.fn.Watermark = function(text,color) 
	{
		if(!color)
			color="#FF0000";
		return this.each(
			function()
			{		
				var input=$(this);
				var defaultColor=input.css("color");
				map[map.length]={text:text,obj:input,DefaultColor:defaultColor,WatermarkColor:color};
				function clearMessage()
				{
					if(input.val()==text)
						input.val("");
					input.css("color",defaultColor);
				}

				function insertMessage()
				{
					if(input.val().length==0 || input.val()==text)
					{
						input.val(text);
						input.css("color",color);	
					}
					else
						input.css("color",defaultColor);				
				}

				input.focus(clearMessage);
				input.blur(insertMessage);								
				input.change(insertMessage);
				
				insertMessage();
			}
		);
	};
})(jQuery);
</script>
<script type="text/javascript">
jQuery(function($)
{
   $("#email").Watermark("Enter Email");
    $("#psw").Watermark("Enter Password");
   });
</script>

</head>

<body>
	<p align="right"><a href="admin_log.php">Admin Login</a></p>
	<form name="frn_login" action="<?php  $_SERVER['PHP_SELF'];?>" method="post">
		<table border="1" align="center" rules="groups" width="400">
			<tr bgcolor="#000000">
				<th colspan="2" style="color:#CCCCCC">Login Form</th>
			</tr>
			<tr>
				<td colspan="2"><?php echo $_SESSION['msg'];?></td>
			</tr>
			<tr>
				<td><b><u>E</u></b>mail</td>
				<td><input type="text" name="email" id="email" /></td>
			</tr>
			<tr>
				<td><b><u>P</u></b>assword</td>
				<td><input type="password" name="psw" id="psw" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><p>Not Registered yet?<a href="registration.php">Register Now!!!</a></p></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="SUBMIT" value="Login" /></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 

	if(isset($_POST['SUBMIT']) && $_POST['SUBMIT']=='Login')
	{
		$email=$_POST['email'];
		$psw=$_POST['psw'];
		
		$sel="SELECT * FROM login WHERE email='$email'";
		$res=mysql_query($sel) or mysql_error();
		$fet=mysql_fetch_array($res);
		$row=mysql_num_rows($res);
		if($row>0)
		{
			if($psw==$fet['psw'])
			{
				if($fet['status'] == 'Active')
				{
					
					$_SESSION['email']=$email;
					echo "<script>alert('Logged In');
					window.location='home.php'
					</script>";
				}
				else
				{		
					echo "<script>alert('Your Account Is Not Activated');
					window.location='index.php'
					</script>";
				}		
			}
			else
			{	
				echo "<script>alert('Password is Incorrect');
					window.location='index.php'
				</script>";
			}
		}
		else
		{
			echo "<script>alert('You are not Registered');
				window.location='index.php'
			</script>";
		}
		
	}
?>