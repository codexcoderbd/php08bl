<?php

$a = 55;

$b =&$a; //$b should be 55


echo $b; //prints  55

$a = 65; // $a = 65 now

print "<br/>";
print $b; //prints 65
