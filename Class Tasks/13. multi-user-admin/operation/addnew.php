<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once("../config.php");
	
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "")
 {
    // not logged in send to login page
    redirect("../index.php");
}

    
    # start code for purchese . . . 
	if(isset($_POST['btnsavePur']))
	{
		$name = $_POST['name'];// user name
		$quantity = $_POST['quantity'];// user email
		$price = $_POST['price'];// user email
		
		
		
		if(empty($name))
		{
			$errMSG = "Please Enter Item Name.";
		}
		else if(empty($quantity))
		{
			$errMSG = "Please Enter Quantity";
		}
		else
		{
			
			}
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB->prepare('INSERT INTO Purchases(Item_name,Item_quantity,Item_price) VALUES(:uname, :uq, :up)');

			$stmt->bindParam(':uname',$name); 
			$stmt->bindParam(':uq',$quantity);
			$stmt->bindParam(':up',$price);
			
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;../purchases.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
	# End code for purchese . . . 

	# Start code for Stockes . . . 

		if(isset($_POST['btnsaveStk']))
	{
		$name = $_POST['name'];// user name
		$quantity = $_POST['quantity'];// user email
		$price = $_POST['price'];// user email
		
		
		
		if(empty($name))
		{
			$errMSG = "Please Enter Item Name.";
		}
		else if(empty($quantity))
		{
			$errMSG = "Please Enter Quantity";
		}
		else
		{
			
			}
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB->prepare('INSERT INTO stocks(Item_name,Item_quantity,Item_price) VALUES(:uname, :uq, :up)');

			$stmt->bindParam(':uname',$name); 
			$stmt->bindParam(':uq',$quantity);
			$stmt->bindParam(':up',$price);
			
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;../stocks.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
	# End code for Stockes . . . 






?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload, Insert, Update, Delete an Image using PHP MySQL</title>

<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">

</head>
<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <?php include 'navbar.php'; ?>
</div>

<div class="container">


	<div class="page-header">
    	<h1 class="h2">Add New Purchases</h1> <a class="btn btn-default" href="../purchases.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a>
    </div>
    

	<?php
	error_reporting( ~E_NOTICE );
	if(isset($errMSG))
	{
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG))
	{
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Item Name</label></td>
        <td><input class="form-control" type="text" name="name" placeholder="Enter Name" value="<?php echo $name; ?>" /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Quantity</label></td>
        <td><input class="form-control" type="text" name="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" /></td>
    </tr>    
    <tr>
    	<td><label class="control-label">Price</label></td>
        <td><input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $price; ?>" /></td>
    </tr>    
    
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsavePur" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>




    

</div>



<!-- Latest compiled and minified JavaScript -->
<script src="../tstrap/js/bootstrap.min.js"></script>


</body>
</html>