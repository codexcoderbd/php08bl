<?php

foreach (glob("*.php") as $filename) 
{
	echo "$filename size ". filesize($filename) . " bytes <br />";
}
//glob() cannot support in remote file system.
?>
