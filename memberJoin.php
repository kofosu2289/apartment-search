<!doctype html>
<html>
<head>
	
	<meta charset ='utf-8'>
	<title>Join Now</title>
<script>
	//make sure the pswds match before sending form data
	function validatePasswords(){
		const pswd = document.getElementById('pswd').value;
		const pswd2 = document.getElementById('pswd2').value;
		//make sure the pswds match
		if(pswd != pswd2){
			alert("Passwords Don't Match!");
			return false;//stop the prcoess; stay on this page
		}
	}
</script>
</head>
<body>
    
    <form method="post" action="memberJoinProc.php" onsubmit="return validatePasswords()">
		<table width = '600px' border = '1'>
			<th align = 'center' colspan = '2'>
				<h1>Join Now! It's Free!</h1>
			</th>
				
			
        <tr>
			<td align = 'center'>First Name:</td> 
			<td><input type="text" name="firstName" required placeholder="First Name"></td>
		</tr>
        
		<tr>
			<td align = 'center'>Last Name:</td> 
			<td><input type="text" name="lastName" required placeholder="Last Name"></td>
		</tr>
        
		<tr>
			<td align = 'center'>Email:</td> 
			<td><input type="email" name="email" required placeholder="Email"></td>
		</tr>
        
		<tr>
			<td align = 'center'>Username:</td> 
			<td><input type="text" name="user" required placeholder="Username"></td>
		</tr>
        
		<tr>
			<td align = 'center'>Password:</td> 
			<td><input type="password" name="pswd" id='pswd' required placeholder="Password"></td>
		</tr>
			
		<tr>
			<td align = 'center'>Re-Type Password:</td> 
			<td><input type="password" name="pswd2" id='pswd2' required placeholder="Re-Type Password"></td>
		</tr>
        
		<tr>
			<td align ='center' colspan = '2'><button>Submit</button></td>
		</tr>
			
		</table>
        
    </form>
</body>
</html>