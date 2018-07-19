<!doctype html>
<html>
	<head>
		<title>PHP Introduction</title>
	</head>
	<body>
		<?php
			$firstName = "Brian";
			$lastName = 'McClain';
			$age = 23;
			$fruits = ['Apple', 'Banana', 'Cherry'];
			$fruits = [
				0=> 'Apple',
				'acidic' => 'Apple',
				'sweet' => 'Banana',
				'tart' => 'Cherry',
			];
		?>
		<p><?php echo "Hello $firstName $lastName in double quotes"; ?></p>
	<?php echo '<p style = "color:blue">
Hello '.$firstName.' '.$lastName.' O\'brian in single quotes'; ?>
		<?php echo  '<h2> The first fruit is '.$fruits[0].'. But the sweetest one is '.$fruits['sweet'].'</h2>';
		?>
		
		<p><a href = "movies.php?genre=comedy&title=Animal%House&year=1978">Watch Now</a></p>
	</body>
</html>