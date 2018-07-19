<?php

	
error_reporting(-1);
if(isset($_GET['doorman'])){
	$doorman = $_GET['doorman'];
} else{
	$doorman = 0;
	  }
   
if(isset($_GET['riverview'])){
	$riverview = $_GET['riverview'];
} else{
	$riverview=0;
}

if(isset($_GET['parking'])){
	$parking = $_GET['parking'];
} else{
	$parking = 0;
}

if(isset($_GET['gym'])){
	$gym = $_GET['gym'];
} else{
	$gym = 0;
}
   
   $bdrms = $_GET['bdrms'];

   $bthrms = $_GET['bthrms'];
   
   $rent =$bdrms + $bthrms + $riverview + $parking + $gym;
   
   $rent += $rent * $doorman;

	$rent = number_format((float)$rent, 2, '.', '');
   
   ?>
<!doctype html>
<body>

<h1>Your estimated rent is $<?php echo "$rent"; ?></h1></body>
	
	
   