<?php
	require_once("conn/connApts.php");
		  //Get the Variable passed in via the anchor link/URL
		  //$bldgID = $_GET['bldgID'];
		//$apt = $_GET['apt'];
	$IDapt = $_GET['IDapt'];

	$query = "SELECT * from apartments, buildings, neighborhoods
		WHERE apartments.bldgID = buildings.IDbldg AND buildings.hoodID = neighborhoods.IDhood AND IDapt = '$IDapt'";

	$result = mysqli_query($conn, $query);

		  //Test the result, expecting '1'
		  //echo mysqli_affected_rows($conn);

		  //Store the row retrieved from the database
	$row = mysqli_fetch_array($result);
	$bedrooms = '';//declare variable to indicate number of bedrooms

	//statements to edit variable that indicates number of bedrooms
	if($row['bdrms'] == 0){
		$bedrooms = '0 (Studio)';
	}else{
		$bedrooms = $row['bdrms'];
	}

	$available = '';//variable to display apartment availability
	if($row['isAvail'] == 0){
		$available = 'Occupied';
	}else{
		$available = 'Available';
	}

	//statements to declare variables to be used to display amenities icons
	if($row['isDoorman'] == 1){
		$image1 = 'doorman.png';
	}

	if($row['isPets'] == 1){
		$image2 = 'pets.jpg';
	}

	if($row['isParking'] == 1){
		$image3 = 'parking.jpg';
	}

	if($row['isGym'] == 1){
		$image4 = 'gym.jpg';
	}
?>
<!DOCTYPE html>
<html>
	<head>
  		<title><?php echo 'Apartment Details' ?></title>
		<link href="css/apts.css" rel="stylesheet" type="text/css">
		<script> function goBack() {
				window.history.back();
		}
		</script>
	</head>
	<body>
		<table border="1px">
    	<tr>
    	<td colspan="3">
        	<h1>Details for Apt 
				<?php 
					echo $row['apt']; 
				?>, 
				<?php 
					echo $row['bldgName']; 
				?> :&nbsp;&nbsp;
				<?php 
					echo $available; ?>
			  </h1>
      	</td>
    </tr>
    	<tr>
      <td rowspan="2">
        <img src="images/propPics/<?php echo $row['bldgPic']; ?>">
      </td>
      <td><h3>Apartment Details</h3>Floor: <?php echo $row['floor']; ?><br/>Bedrooms: <?php echo $bedrooms; ?><br/>Bathrooms: <?php echo $row['baths']; ?><br/>Rent: <?php echo $row['rent']; ?><br/>Size: <?php echo $row['sqft']; ?> sqft</td>
		<td><h3>Building Details</h3><strong>Neighborhood</strong><br/><?php echo $row['hoodDesc']; ?><br/><br/><strong>Amenities</strong><br/> 
			<?php if($row['isDoorman']==1){echo '<img src = "images/amenitiesIcons/'.$image1.'">Doorman';} ?> <?php if($row['isPets']==1){echo '<img src = "images/amenitiesIcons/'.$image2.'">Pet-Friendly';} ?><br/>
			<?php if($row['isParking']==1){echo '<img src = "images/amenitiesIcons/'.$image3.'">Parking';} ?>
			<?php if($row['isGym']==1){echo '<img src = "images/amenitiesIcons/'.$image4.'">Gym';} ?>
		</td>
		
		
    </tr>
    	<tr>
      <td colspan="2"><?php echo $row['aptDesc']; ?></td>
    </tr>
    	<tr>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['email']; ?></td>
</tr>     
  	 </table>
		<button type = "button" onclick = "goBack()">Back to Search Results</button>
	</body>
</html>