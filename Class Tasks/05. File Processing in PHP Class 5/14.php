<?php 

$file_name = "xyz.php";

if (touch($file_name)) 
{
   echo "$file_name modification time has been changed to present time";
}
 else 
{
   echo "Sorry, could not change modification time of $file_name";
}
?>
