<?php
include_once("class.person_2.php");

// create instance
$baby = new Person;
$baby->name = "Mr. Baby";
$baby->weight = 28;

// retrieve properties
echo $baby->name."\nweighs\n".$baby->weight."kg\n"."<br>";

// call eat()
$baby->eat("Burger", 500);
$baby->eat("Cashew Nuts", 500);

// retrieve new values
echo $baby->name."\nnow weighs\n".$baby->weight."\nkg\n"."<br>";

?>