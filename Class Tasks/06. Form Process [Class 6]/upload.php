<html>
<head>
	<title>File Upload Example</title>
</head>
<body>
<h1>File Upload Example</h1>
<?php

$upload_dir ="images";
 
if ( isset($_FILES['fupload']))
 {
	$file_name = $_FILES['fupload']['name'];
	$file_type = $_FILES['fupload']['type'];
	print "Path: ".$_FILES['fupload']['tmp_name']."<br />";
	print "Name: $file_name <br />";
	print "Size: ".$_FILES['fupload']['size']."<br />";
	print "Type: $file_type <br />";
	if ($file_type =="image/jpeg" or $file_type=="image/gif") {
		copy($_FILES['fupload']['tmp_name'], "$upload_dir/$file_name") or die("Couldn't copy");
		print "<img src=\"$upload_dir/$file_name\" width=\"200\", height=\"150\"<p>";
	}
}

?>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Select a File: <input type="file" name="fupload" /><br />
<input type="submit" value="Upload File" />
</form>
</body>
</html>