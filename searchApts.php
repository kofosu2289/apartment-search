<?php 
 require_once("conn/connApts.php");
$query ="SELECT IDbldg, bldgName FROM buildings ORDER BY bldgName ASC";
$result = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Apartment Search</title>
		<link href="css/apts.css" type="text/css" rel="stylesheet">
	</head>

	<body>
		<div id = "container">
			<h1>Apartment Search </h1>

			<!-- We use "get" here because we are only GETting information -->

			<form method="get" action="searchAptsProc.php" onsubmit="return validateMinMaxRent()">
				
				<label>Search</label>
					<input type = "text" name ="search" id="search" placeholder = "Please place search terms in double quotes ("")!"><br/>
				
				<label>Building
					<select name = "bldg" id = "bldg">
						<option value = "-1">Any</option>
						<?php
						while($row=mysqli_fetch_array($result)){
						echo '<option value="' . $row['IDbldg'] . '">' .$row['bldgName'] . '</option>';
						}
					?>
					</select>
				
					</label><br/>
				
				<!-- 
				  Lab Page 42:
					Add minRent select in searchApts.php and searchAptsProc.php
					Add validateMinMaxRent() function to ensure that the maxRent is >= minRent



				-->
				<label>Min Rent:

				  <select name="minRent" id="minRent">
					<option value="0">Any</option>

					<?php 
					  $i = 1000;

					  while($i <= 5000){
						echo '<option value="' . $i . '">$' . number_format($i) . '</option>';
						$i += 250;
					  }

					?>

				  </select>
				</label><br/>

				  <label>Max Rent:
					<select name="maxRent" id="maxRent">
					  <option value="99999">Any</option>

					  <?php 
						$i = 2000;

						while($i <= 7500){
						  echo '<option value="' . $i . '">$' . number_format($i) . '</option>';
						  $i += 500;
						}

					  ?>

					</select>
				  </label><br/>


				<label>Bedrooms:

					<select name="bdrms" id="bdrms">
					<option value = "-1">Any</option>
					<option value="0">Studio</option>
					<option value="1" selected>1 bedroom</option>
					<option value = "1.1">1+ bedroom</option>
					<option value="2">2 bedrooms</option>
					<option value = "2.1">2+bedrooms</option>
					<option value="3">3 bedrooms</option>

				</select>
					</label><br/>

				<label>Baths:
				  <select name="baths" id="baths">
					  <option value = "-1">Any</option>
					<option value="1">1 Bath</option>
					<option value="1.5">1 1/2 Baths</option>
					  <option value = "1.6">1 1/2+ Baths</option>
					<option value="2">2 Baths</option>
					  <option value = "2.1">2+ Baths</option>
					<option value="2.5">2 1/2 Baths</option>
				  </select>
				</label>

				<h2>Building Amenities</h2>

				<label for="doorman"><input type="checkbox" name="doorman" value="doorman" id="doorman" class="cbW"> Doorman</label>
				<label for="pets"><input type="checkbox" name="pets" value="pets" id="pets" class="cbW"> Pet-friendly</label>
				<br/><br/>
				<label for = "parking"><input type="checkbox" name="parking" value="parking" id="parking" class="cbW"> Parking</label>
				<label for = "gym"><input type="checkbox" name="gym" value="gym" id="gym" class="cbW"> Gym</label>

				<p><button>Submit</button></p>

			</form>
		</div><!--close #container-->


		<script>
		  function validateMinMaxRent(){
			let minRent = Number(document.querySelector('#minRent').value);
			let maxRent = Number(document.querySelector('#maxRent').value);

			if(minRent >= maxRent){
			  alert('Please choose a min rent value that is less than the max rent value');
			  return false;
			}


		  }

		</script>

	</body>
</html>