<?php 

$filename = '02.php';

if (file_exists($filename)) 
{
	echo "$filename was last modified: " . date("d m y", filemtime($filename));
}

?>
