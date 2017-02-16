<?php
//নিচেরটি কাজ করবে না, কারণ এর আর্গুমেন্ট ব্রাকেটের ভেতরে রাখা হয়েছে 


//এটি কাজ করবে

if(include('vars.php'))
{
echo "File Found";	
}
else
{
	echo "failed to connect";
}
?>