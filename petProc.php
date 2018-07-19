<?php 
if($_GET['pet']=='Dog') {
	$sound = 'Woof';
} elseif($_GET['pet']=='Cat'){
	$sound = 'Meow';
}elseif($_GET['pet']=='Rabbit'){
	$sound = 'Crunch';
}else{
	$sound = 'Unknown';
}
?>

<!doctype html>
<html>
	<head></head>
	<body>
		<table width = '500'  border = '1' cellpadding = '5' align = 'center'>
			<th colspan="3">PHP Pet survey</th>
			<tr>
				<td colspan = '2'>
					<?php echo "<img src = '../../images/".$pet.".jpg'>"?>
				</td>
				
				<td>
					<?php echo "<h1 align = 'center'>". $sound. "!So, you're a " .$pet. "person! <br>Does your pet like " .$food. "?</h1>"; ?>
				</td>
			</tr>
		</table>
	</body>
</html>