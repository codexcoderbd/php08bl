<?php
		error_reporting(0);
		// include phpmailer class
		require_once 'mailer/class.phpmailer.php';
		// creates object
		$mail = new PHPMailer();	
		
		if(isset($_POST['btn_send']))
		{
			$full_name  = strip_tags($_POST['full_name']);
			$email      = strip_tags($_POST['email']);
			$subject    = "Sending HTML eMail using PHPMailer.";
			$text_message    = "Hello $full_name, <br /><br /> This is HTML eMail Sent using PHPMailer.";			   
			
			
			// HTML email starts here
			
			$message  = "<html><body>";
			
			$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
			
			$message .= "<tr><td>";
			
			$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
				
			$message .= "<tbody>
						
						
						<tr>
							<td colspan='4' style='padding:15px;'>
								<p style='font-size:20px;'>Hi' ".$full_name.",</p>
								<hr />
								<p style='font-size:25px;'>Sending HTML eMail using PHPMailer</p>
								
								<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>".$text_message.".</p>
							</td>
						</tr>
						
					
						</tbody>";
				
			$message .= "</table>";
			
			$message .= "</td></tr>";
			$message .= "</table>";
			
			$message .= "</body></html>";
			
			// HTML email ends here
			
			try
			{
				$mail->IsSMTP(); 
				$mail->isHTML(true);
				$mail->SMTPDebug  = 0;                     
				$mail->SMTPAuth   = true;                  
				$mail->SMTPSecure = 'ssl';                 
				$mail->Host       = 'smtp.gmail.com';      
				$mail->Port       = 465;             
				$mail->AddAddress($email);
				$mail->Username   ='testmailbd17@gmail.com';  
				$mail->Password   ='testmailbd17#';            
				$mail->SetFrom("testmailbd17@gmail.com","TestMailBD");
				$mail->AddReplyTo("testmailbd17@gmail.com","TestMailBD");
				$mail->Subject    = $subject;
				$mail->Body 	  = $message;
				$mail->AltBody    = $message;
					
				if($mail->Send())
				{
					
					$msg = "
							Hi,<br /> ".$full_name." mail was successfully sent to ".$email." go and check:)
							";
					
				}
			}
			catch(phpmailerException $ex)
			{
				$msg = "<div class='alert alert-warning'>".$ex->errorMessage()."</div>";
			}
		}	
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sending HTML eMail using PHPMailer in PHP</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css">
</head>
<body>



<div class="container">

	<div class="page-header">
    	<h1>Send HTML eMails using PHPMailer</h1>
    </div>
	    
    <div class="email-form">
    
    	<?php
		if(isset($msg))
		{
			echo $msg;
		}
		?>
        
    	<form method="post">
        
            <div class="form-group">
                <input class="form-control" type="text" name="full_name" placeholder="Your Name" />
            </div>
            
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Receipent Email Address" />
            </div>
            
            <div class="form-group">
                <button class="btn btn-success" type="submit" name="btn_send">
                <span class="glyphicon glyphicon-envelope"></span> Send Mail
                </button>
            </div>
        
    	</form>
    </div>    
</div>
</body>

</html>
		