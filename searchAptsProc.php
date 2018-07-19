<?php 

// 1.) there is no form to process, so skip the POST / GET vars part
$bdrms = $_GET['bdrms'];
$baths = $_GET['baths'];
$minRent = $_GET['minRent'];
$maxRent = $_GET['maxRent'];
//$pets = $_GET['pets'];


// 2 + 3.) Connect to mysql, and select the database
require_once("conn/connApts.php");

// 4.) write out the CRUD "order" (query) -- what you want to do
$query = "SELECT * from apartments, buildings, neighborhoods
WHERE apartments.bldgID = buildings.IDbldg 
AND buildings.hoodID = neighborhoods.IDhood  
AND rent BETWEEN '$minRent' AND '$maxRent'";


if($bdrms!=-1){
	if($bdrms == round($bdrms)){
	$query .= " AND bdrms='$bdrms'";
	}else{
		$bdrms = round($bdrms);
		$query .= " AND bdrms >= '$bdrms'";
	}
}
//}else{
//		$bdrms = round($bdrms);
//		$query .= " AND bdrms <= '$bdrms'";
//	}

if($baths!=-1){
	$baths10 = $baths * 10;
		if($baths10 % 5 == 0){
			$query .= " AND baths='$baths'";
		}else{
			$baths -= 0.1;
			$query .= " AND baths >= '$baths'";
		}
}




// concat query for checkboxes -- "check" to see, one by one, if the checkboxes are actually checked
if(isset($_GET['doorman'])) { // is the doorman variable set. if so it came over from the form, meaning doorman was checked
    $query .= " AND isDoorman=1";
}

if(isset($_GET['pets'])) { 
    $query .= " AND isPets=1";
}

if(isset($_GET['parking'])) { 
    $query .= " AND isParking=1";
}

if(isset($_GET['gym'])) { 
    $query .= " AND isGym=1";
}

$query .= " ORDER BY rent DESC";

  // Order by *columnName* *ASC/DESC* <-- Sort based on a column

// 5.) execute the order: read records from apartments table

$result = mysqli_query($conn, $query);  // the result will be an array of arrays (or, a multi-dimensional array)

?>

<!doctype html>

<html lang="en-us">
    
<head>
    
    <meta charset="utf-8">
    
    <title>Member Join Processor</title>
	
	<script> function goBack() {
				window.history.back();
		}
		</script>
    
</head>

<body>
    
    
    
    <table width="800" border="1" cellpadding="5">
    
    <tr>
        <td colspan="15" align="center">
            <h1 align="center">Lofty Heights Apartments</h1>
            </td>
        </tr>
        <tr>
            <th>ID</th>
            <th>Apt</th>
            <th>Building</th>
            <th>Bedrooms</th>
            <th>Baths</th>
            <th>Rent</th>
            <th>Floor</th>
            <th>Sqft</th>
            <th>Status</th>
            <th>Neighborhood</th>
            <th>Doorman</th>
            <th>Pets</th>
            <th>Gym</th>
            <th>Parking</th>
			<th>Floorplan</th>

        </tr>
        
        <?php
        while($row = mysqli_fetch_array($result)) { ?>
          
          <tr>
              <td><?php echo $row['IDapt']; ?></td>
              <td><?php echo '<a href = "aptDetails.php?IDapt=' . $row['IDapt']. '">' . $row['apt'] . '</a>'; ?></td>
              
              <td>
              
            <?php 
              echo '<a href="bldgDetails.php?bldgID=' 
                  . $row['bldgID'] . '">' 
                  . $row['bldgName'] . '</a>';
            ?>
              
              </td>
              
              <td><?php
                              
                  // ternary as alternative to if-else
                  echo $row['bdrms'] == 0 ? 'Studio' : $row['bdrms'];
                           
                  // if-else version of the ternary above
//                  if($row['bdrms'] == 0) {
//                     echo 'Studio'; 
//                  } else {
//                      echo $row['bdrms'];
//                  }
                                                  
              ?>
              
              </td>
              <td><?php echo $row['baths']; ?></td>
              <td><?php echo $row['rent']; ?></td>
              <td><?php echo $row['floor']; ?></td>
              <td><?php echo $row['sqft']; ?></td>
              <td>
                <?php 
                    if($row['isAvail'] == 0) {
                      echo "Occupied";
                    } else { // value is 1
                      echo "Available";
                    }                
                ?>
              
              </td>
              <td><?php echo $row['hoodName']; ?></td>
              <td>
                  
                <?php 
              
                    if($row['isDoorman'] == 0) {
                      echo 'No'; 
                    } else {
                      echo 'Yes';
                    }
              
                ?>
              
              </td>
              
              <td><?php echo $row['isPets'] == 0 ? 'No':'Yes'; ?></td>
              
              <td><?php echo $row['isGym'] == 0 ? 'No':'Yes'; ?></td>
              
              <td><?php echo $row['isParking'] == 0 ? 'No':'Yes'; ?></td>
			  
			  <td><a href = "pdf/<?php echo $row['floorplan']; ?>">Floorplan</a></td>
              
          </tr>
        
        <?php } ?>
    
    </table>
    
	<button type = "button" onclick = "goBack()">Back to Search</button>
</body>
   
</html>