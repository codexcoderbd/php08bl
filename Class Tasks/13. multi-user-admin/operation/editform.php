<?php

	error_reporting( ~E_NOTICE );
	
	require_once("../config.php");
	if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "")
 {
    // not logged in send to login page
    redirect("../index.php");
}
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		
		$stmt_edit = $DB->prepare('SELECT Item_name, Item_quantity, Item_price FROM purchases WHERE ID =:uid');
		
		$stmt_edit->execute(array(':uid'=>$id));
		
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: ../purchases.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$name = $_POST['name'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
			
							
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			 
			$stmt = $DB->prepare('UPDATE Purchases 
									     SET Item_name=:uname, 
										     Item_quantity=:uq, 
										     Item_price=:up
								       WHERE ID=:uid');
			$stmt->bindParam(':uname',$name); 
			$stmt->bindParam(':uq',$quantity);
			$stmt->bindParam(':up',$price);
			$stmt->bindParam(':uid',$id);

		
			if($stmt->execute())
			{
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='../purchases.php';
				</script>
                <?php
			}
			else
			{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL</title>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body>

<?php include 'navbar.php'; ?>


<div class="container">


	<div class="page-header">
    	<h1 class="h2">update profile. <a class="btn btn-default" href="index.php"> all members </a></h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG))
	{
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Item Name</label></td>
        <td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $Item_name; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Quantity</label></td>
        <td><input class="form-control" type="text" name="quantity" placeholder="Quantity" value="<?php echo $Item_quantity; ?>" /></td>
    </tr>    
    <tr>
    	<td><label class="control-label">Price</label></td>
        <td><input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $Item_price; ?>" /></td>
    </tr>    
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-success">
        <span class="glyphicon glyphicon-save "></span> Update
        </button>
       
        <a class="btn btn-danger" href="../purchases.php"> <span class="glyphicon glyphicon-backward "></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>
</div>
</body>
</html>