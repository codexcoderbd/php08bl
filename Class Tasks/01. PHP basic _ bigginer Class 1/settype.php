<?php
$foo='5bar';//string
$bar=true;//boolean
settype($foo,integer);//$foo is now 5(integer)
echo gettype($foo);//prints integer
echo $foo;//prints 5
echo "<br>";

settype($bar,string);//$bar is now string '1'
echo gettype($bar);//print string
echo $bar;//prints 1
echo "<br>";

settype($foo,string);//$foo is now string '1'
echo gettype($foo);//print string
echo $foo;//prints 5
echo "<br>";

settype($foo,double);//$foo is now 5 (double)
echo gettype($foo);//print double
echo $foo;//prints 5
echo "<br>";

settype($foo,boolean);//$foo is now true
echo gettype($foo);//print boolean
echo $foo;//prints 1
?>


