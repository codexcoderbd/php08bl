<?php
$host = "localhost";
$username= "root";
$password= "";
$dbname="accountActivation";
$con= mysqli_connect("$host","$username","$password");

mysqli_select_db($con,$dbname) ;
error_reporting('E_ALL ^ E_NOTICE');

?>