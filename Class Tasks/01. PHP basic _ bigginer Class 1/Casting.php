<?php
$foo='6b55ar';
$bar=true;

$a=(bool) $foo;
echo gettype($a);
echo $a;
echo "<br>";

$b=(integer) $foo;
echo gettype($b);
echo $b;
echo "<br>";

$c=(double) $foo;
echo gettype($c);
echo $c;
echo "<br>";

$d=(string) $foo;
echo gettype($d);
echo $d;
echo "<br>";

$e=(string) $bar;
echo gettype($e);
echo $e;
?>