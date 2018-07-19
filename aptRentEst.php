<!doctype html>
<body>
	<!--<h1>Apartment Rent Estimator</h1>-->
	<form method = "GET" action = "aptRentEstProc.php">
		<table width = "500px" border = "1">
			
			<th colspan = "2"><h1>Apartment Rent Estimator</h1></th>
			
			<tr>	
				<td align="center">Bedrooms</td>
		
			
		
				<td>
					<select name ="bdrms">
					
					<option value = "1000">Studio ($1,000)</option>
			
					<option value = "1400" selected>1 Bedroom ($1,400)</option>
			
		
					<option value="1800">2 Bedrooms ($1,800)</option>
				
					</select>
				</td>
			</tr>
			
			<tr>
				<td align="center">Bathrooms</td>
				
				<td>
					<select name = 'bthrms'>
						<option value = '0' selected>1 Bathroom</option>
						
						<option value = '200'>1.5 Bathrooms ($200)</option>
						
						<option value = '250'>2 Bathrooms ($250)</option>
						
						<option value = '300'>2.5 Bathrooms ($300)</option>
					</select>
				</td>
			</tr>
			
			<tr>
		
			<td colspan = "2">
				<h3>Additional monthly charges apply for these amenities:</h3>
			</td>
		</tr>
			
			<tr>
				<td align="center">
					Doorman (+20%)
				</td>
			
				<td>
					<input type="checkbox" name = "doorman" value="0.2">
				</td>
			</tr>
			
			<tr>
				<td align="center">
					View of River (+$150)
				</td>
			
				<td>
					<input type="checkbox" name = "riverview" value="150">
				</td>
			</tr>
			
			<tr>
				<td align="center">Parking ($250)</td>
				
				<td>
					<input type = "checkbox" name = "parking" value = "250">
				</td>
			</tr>
			
			<tr >
				<td align = "center">Gym ($80)</td>
				
				<td>
					<input type="checkbox" name = "gym" value = "80">
				</td>
			</tr>
		
			<tr>
				<td colspan = "2" align="center">
					<button>Submit</button>
				
				</td>
			</tr>
		</table>
			
	
	</form>
</body>