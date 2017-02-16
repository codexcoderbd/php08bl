<?php

error_reporting(E_ALL & ~E_NOTICE);
$name1 = "Mahfuz";
$name2 = "Rafiq";
$name3 = "Stephen";
$name4 = "Sabina";
//$name5="aman";

foreach ($GLOBALS as $key=>$value) 
{
	print "\$GLOBALS[\"$key\"] == $value <br />";
}

?>