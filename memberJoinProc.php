<?php
	//processor for form on memberjoin.php
	//hand off the incoming form POST variables to 'regular' variables
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$pswd = $_POST['pswd'];

	//connect to MySQL
	$conn = mysqli_connect("localhost", "root", "mysql") or die("Couldn't connect to MySQL");
	//connect to database
	mysqli_select_db($conn, "LoftyHts") or die("Couldn't connect to the Database!");
	//write out your CRUD 'order' (query) -- what you want to do
	$query = "INSERT INTO members(firstName, lastName, email, user, pswd)
	VALUES('$firstName','$lastName','$email','$user','$pswd')";
	//insert the new record into the members table
	mysqli_query($conn, $query);
	//give the user some feedback -- did it work or not?
	$registered = mysqli_affected_rows($conn);
	//if($registered == 1){
	//	echo "Welcome " . $firstName . " " . $lastName . "! Thanks for Joining!";
	//}else{
	//	echo "Sorry " . $firstname . " " . $lastName . "! Couldn't sign you up!";
	//}
if($registered == -1){
		echo "<h1>Sorry " . $firstname . " " . $lastName . "! Couldn't sign you up!</h1>";	}

?>
<!doctype html>
<html>
<head>
	
	<meta charset ='utf-8'>
	<title>Member Join Processor</title>


</head>
<body>
   <?php echo "<h1>Welcome, " . $firstName . "! Thank you for joining!</h1>";?> 
   
	
</body>
</html>