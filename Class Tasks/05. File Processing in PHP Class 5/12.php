<?php

$filename = 'mynewfile.txt';

if (file_exists($filename))
 {
	echo "$filename was last changed on: " . date("d m y h:i:s.",filectime($filename));
}

?>
