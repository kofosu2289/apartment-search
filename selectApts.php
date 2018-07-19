<?php
	//there is no form to process , so skip the POST/GET variables declarations
	//connect to MySQL
	$conn = mysqli_connect("localhost", "root", "mysql") or die("Couldn't connect to MySQL");

	//connect to database
	mysqli_select_db($conn, "LoftyHts") or die("Couldn't connect to the Database!");

	//write out your CRUD 'order' (query) -- what you want to do
	$query = "SELECT * FROM apartments, buildings, neighborhoods WHERE apartments.bldgID = buildings.IDbldg AND buildings.hoodID = neighborhoods.IDhood ORDER BY rent DESC";

	//execute the order; read records from apartments table
	$result = mysqli_query($conn, $query);

	//peel off the first row of data off array of arrays($result)
	//$row = mysqli_fetch_array($result);

	//testing
	//echo $row['rent']; //should be the rent of apt 1
?>
<html lang="en">
<head>
	
	<meta charset ='utf-8'>
	<title>Member Join Processor</title>


</head>
<body>
   <table width = "600px" border = "1" cellpadding="5px" align = "center">
	
		<tr>
	   		<td align = "center" colspan = "14"><h1>Lofty Heights Apartments</h1></td>
	   </tr>
	   
	   <tr>
	   <th>ID</th>
	   <th>Apt</th>
	   <th>Building</th>
		<th>Neighborhood</th>
	   <th>Floor</th>
	   <th>Bdrms</th>
	   <th>Baths</th>
	   <th>Rent</th>
	   <th>Sqft</th>
	   <th>Vacancy</th>
		<th>Doorman</th>
		<th>Pets</th>
		 <th>Parking</th>
		 <th>Gym</th>
	   </tr>
	   
	   <?php 
	   
	   	while($row = mysqli_fetch_array($result)) { ?>
	   <tr>
	   <th><?php echo $row['IDapt'];?></th>
	   <th><?php echo $row['apt'];?></th>
	   <th><?php echo $row['bldgName'];?></th>
		  <th><?php echo $row['hoodName'];?></th>
	   <th><?php echo $row['floor'];?></th>
	   <th><?php echo $row['bdrms'];?></th>
	   <th><?php echo $row['baths'];?></th>
	   <th><?php echo "$".$row['rent'];?></th>
	   <th><?php echo $row['sqft'];?></th>
	   <th><?php if($row['isAvail']==0){
				echo 'No';
			}else{
				echo'Yes';}
		
		   ?></th>
		   
	<th><?php if($row['isDoorman']==0){
				echo 'No';
			}else{
				echo'Yes';}
		
		   ?></th>
		   
		   <th><?php if($row['isPets']==0){
				echo 'No';
			}else{
				echo'Yes';}
		
		   ?></th>
		   <th><?php if($row['isParking']==0){
				echo 'No';
			}else{
				echo'Yes';}
		
		   ?></th>
		   <th><?php if($row['isGym']==0){
				echo 'No';
			}else{
				echo'Yes';}
		
		   ?></th>
	   </tr>
	   
	   <?php } ?>
	   
	
	
	</table>
   
	
</body>
</html>