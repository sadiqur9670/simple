<?php
$mag="";
$mag1="";
if (isset($_POST['name'])) {
	//Variable Declear
	$Name= $_POST['name'];
	$Usernames= $_POST['username'];
	$Psss= md5($_POST['password']);

	if (empty($Name)) {
		$mag= "Name must not be empty";
	}elseif (!preg_match("/^[a-zA-Z]*$/", $Name)) {
		$mag1= "Only use charecter on Name fild";
	}
	$mag= $mag.$mag1;

	if ($mag=="") {
		$host="localhost";
		$user= "root";
		$pass= "";
		$database= "delete";

		$conection= new mysqli($host,$user,$pass,$database);
		if ($conection) {
			$slquery = "select * from userid where Name= '$Name'";
			$slstmt= $conection->query($slquery) or die($conection->error);
			if ($slstmt) {
				if($slstmt ->num_rows > 0){
					$mag = "Email already exist";
				}else{
					$query= "insert into userid(name,username,password)values('$Name','$Usernames','$pass')";
					$status= $conection->query($query) or die($conection->error);
					if ($status) {
						$mag = "Data inserted succesfully";
					}else{
						$mag = "Data inserted failed";
					}
				}

			}
		}
		else{
			$mag =  "yes connection failed";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
		<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Name"></td>
		</tr><tr>
			<td>User Name</td>
			<td><input type="text" name="username" placeholder="Usen Name"></td>
		</tr><tr>
			<td>Password</td>
			<td><input type="Password" name="password" placeholder="Enter Passwor"></td>
		</tr>
		</tr><tr>
			
			<td><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>

	</form>
	<p> 
				<?php if($mag !== ''){

					echo $mag;

				} ?>
	

</body>
</html>